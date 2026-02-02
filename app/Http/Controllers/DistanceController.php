<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobOffer;
use App\Models\CompanyProfile;
use App\Services\GeocodingService;
use App\Helpers\DistanceHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistanceController extends Controller
{
    protected $geocodingService;

    public function __construct(GeocodingService $geocodingService)
    {
        $this->geocodingService = $geocodingService;
    }

    /**
     * Calculate distance between authenticated user and a job offer
     */
    public function calculateDistanceToJobOffer(Request $request, $jobOfferId)
    {
        $user = auth()->user();
        $jobOffer = JobOffer::with('city.state')->findOrFail($jobOfferId);

        $distance = $user->distanceToJobOffer($jobOffer, $request->input('unit', 'km'));

        return response()->json([
            'success' => true,
            'data' => [
                'distance' => $distance,
                'distance_formatted' => DistanceHelper::formatDistance($distance, $request->input('unit', 'km')),
                'unit' => $request->input('unit', 'km'),
                'user_location' => [
                    'has_exact_coordinates' => $user->latitude && $user->longitude,
                    'latitude' => $user->latitude ?? $user->city->latitude ?? null,
                    'longitude' => $user->longitude ?? $user->city->longitude ?? null,
                ],
                'job_location' => [
                    'has_exact_coordinates' => $jobOffer->latitude && $jobOffer->longitude,
                    'latitude' => $jobOffer->latitude ?? $jobOffer->city->latitude ?? null,
                    'longitude' => $jobOffer->longitude ?? $jobOffer->city->longitude ?? null,
                ],
            ],
        ]);
    }

    /**
     * Get all candidates for a job offer sorted by distance
     */
    public function getCandidatesByDistance(Request $request, $jobOfferId)
    {
        $jobOffer = JobOffer::with(['users.city.state'])->findOrFail($jobOfferId);
        $unit = $request->input('unit', 'km');

        $candidates = $jobOffer->users->map(function ($candidate) use ($jobOffer, $unit) {
            $distance = $jobOffer->distanceToCandidate($candidate, $unit);

            return [
                'id' => $candidate->id,
                'name' => $candidate->first_name . ' ' . $candidate->last_name,
                'email' => $candidate->email,
                'city' => $candidate->city->name ?? null,
                'has_exact_coordinates' => $candidate->latitude && $candidate->longitude,
                'distance' => $distance,
                'distance_formatted' => DistanceHelper::formatDistance($distance, $unit),
            ];
        })->sortBy('distance')->values();

        return response()->json([
            'success' => true,
            'data' => [
                'job_offer_id' => $jobOffer->id,
                'total_candidates' => $candidates->count(),
                'unit' => $unit,
                'candidates' => $candidates,
            ],
        ]);
    }

    /**
     * Get all job offers for authenticated user sorted by distance
     */
    public function getJobOffersByDistance(Request $request)
    {
        $user = auth()->user();
        $unit = $request->input('unit', 'km');
        $maxDistance = $request->input('max_distance');

        $jobOffers = JobOffer::with(['city.state', 'company', 'jobTitle'])
            ->where('expiration_date', '>=', now())
            ->get()
            ->map(function ($jobOffer) use ($user, $unit) {
                $distance = $user->distanceToJobOffer($jobOffer, $unit);

                return [
                    'id' => $jobOffer->id,
                    'description' => $jobOffer->description,
                    'job_title' => $jobOffer->jobTitle->name ?? null,
                    'company' => $jobOffer->company->name ?? null,
                    'city' => $jobOffer->city->name ?? null,
                    'offered_salary' => $jobOffer->offered_salary,
                    'has_exact_coordinates' => $jobOffer->latitude && $jobOffer->longitude,
                    'distance' => $distance,
                    'distance_formatted' => DistanceHelper::formatDistance($distance, $unit),
                ];
            });

        if ($maxDistance) {
            $jobOffers = $jobOffers->filter(function ($job) use ($maxDistance) {
                return $job['distance'] !== null && $job['distance'] <= $maxDistance;
            });
        }

        $jobOffers = $jobOffers->sortBy('distance')->values();

        return response()->json([
            'success' => true,
            'data' => [
                'total_offers' => $jobOffers->count(),
                'unit' => $unit,
                'max_distance_filter' => $maxDistance,
                'user_has_exact_coordinates' => $user->latitude && $user->longitude,
                'job_offers' => $jobOffers,
            ],
        ]);
    }

    /**
     * Geocode an address and update user coordinates
     */
    public function geocodeUserAddress(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = auth()->user();
        $coordinates = $this->geocodingService->geocodeAddress($request->input('address'));

        if ($coordinates) {
            $user->latitude = $coordinates['latitude'];
            $user->longitude = $coordinates['longitude'];
            $user->full_address = $coordinates['formatted_address'];
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Address geocoded successfully',
                'data' => $coordinates,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to geocode address',
        ], 400);
    }

    /**
     * Geocode job offer address
     */
    public function geocodeJobOfferAddress(Request $request, $jobOfferId)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $jobOffer = JobOffer::findOrFail($jobOfferId);
        $coordinates = $this->geocodingService->geocodeAddress($request->input('address'));

        if ($coordinates) {
            $jobOffer->latitude = $coordinates['latitude'];
            $jobOffer->longitude = $coordinates['longitude'];
            $jobOffer->full_address = $coordinates['formatted_address'];
            $jobOffer->save();

            return response()->json([
                'success' => true,
                'message' => 'Job offer address geocoded successfully',
                'data' => $coordinates,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to geocode address',
        ], 400);
    }

    /**
     * Geocode company address
     */
    public function geocodeCompanyAddress(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = auth()->user();
        $company = $user->company;

        if (!$company) {
            return response()->json([
                'success' => false,
                'message' => 'Company profile not found',
            ], 404);
        }

        $coordinates = $this->geocodingService->geocodeAddress($request->input('address'));

        if ($coordinates) {
            $company->latitude = $coordinates['latitude'];
            $company->longitude = $coordinates['longitude'];
            $company->address = $coordinates['formatted_address'];
            $company->save();

            return response()->json([
                'success' => true,
                'message' => 'Company address geocoded successfully',
                'data' => $coordinates,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to geocode address',
        ], 400);
    }
}
