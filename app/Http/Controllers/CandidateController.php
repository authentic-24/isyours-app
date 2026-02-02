<?php

namespace App\Http\Controllers;

use App\Services\DistanceService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobOffer;


class CandidateController extends Controller
{
    protected $distanceService;

    public function __construct(DistanceService $distanceService)
    {
        $this->distanceService = $distanceService;
    }

    public function index(Request $request)
    {
        $users = User::with('city.state')->get();

        // For employers viewing candidates for a specific job
        $jobOfferId = $request->input('job_offer_id');
        if ($jobOfferId) {
            $jobOffer = JobOffer::with('city')->find($jobOfferId);
            if ($jobOffer && $jobOffer->city) {
                $unit = $request->input('unit', 'km');
                $users = $this->distanceService->enrichCandidatesWithDistance($jobOffer, $users, $unit);
            }
        }

        return response()->json($users);
    }
}
