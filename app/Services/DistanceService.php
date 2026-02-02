<?php

namespace App\Services;

use App\Helpers\DistanceHelper;
use App\Models\JobOffer;
use App\Models\User;

class DistanceService
{
    /**
     * Calculate distance between a candidate and a job offer
     * 
     * @param User $candidate
     * @param JobOffer $jobOffer
     * @param string $unit
     * @return array
     */
    public function calculateCandidateToJobDistance(User $candidate, JobOffer $jobOffer, $unit = 'km')
    {
        $distance = $candidate->distanceToJobOffer($jobOffer, $unit);

        return [
            'distance' => $distance,
            'distance_formatted' => DistanceHelper::formatDistance($distance, $unit),
            'unit' => $unit,
            'candidate_city' => $candidate->city ? $candidate->city->name : null,
            'job_city' => $jobOffer->city ? $jobOffer->city->name : null,
        ];
    }

    /**
     * Get job offers with distances for a specific candidate
     * 
     * @param User $candidate
     * @param \Illuminate\Database\Eloquent\Collection $jobOffers
     * @param string $unit
     * @param float|null $maxDistance Filter by maximum distance
     * @return \Illuminate\Support\Collection
     */
    public function enrichJobOffersWithDistance(User $candidate, $jobOffers, $unit = 'km', $maxDistance = null)
    {
        return $jobOffers->map(function ($jobOffer) use ($candidate, $unit) {
            $distance = $candidate->distanceToJobOffer($jobOffer, $unit);
            $jobOffer->distance = $distance;
            $jobOffer->distance_formatted = DistanceHelper::formatDistance($distance, $unit);
            return $jobOffer;
        })
            ->when($maxDistance !== null, function ($collection) use ($maxDistance) {
                return $collection->filter(function ($jobOffer) use ($maxDistance) {
                    return $jobOffer->distance !== null && $jobOffer->distance <= $maxDistance;
                });
            })
            ->sortBy('distance');
    }

    /**
     * Get candidates with distances for a specific job offer
     * 
     * @param JobOffer $jobOffer
     * @param \Illuminate\Database\Eloquent\Collection $candidates
     * @param string $unit
     * @param float|null $maxDistance Filter by maximum distance
     * @return \Illuminate\Support\Collection
     */
    public function enrichCandidatesWithDistance(JobOffer $jobOffer, $candidates, $unit = 'km', $maxDistance = null)
    {
        return $candidates->map(function ($candidate) use ($jobOffer, $unit) {
            $distance = $jobOffer->distanceToCandidate($candidate, $unit);
            $candidate->distance = $distance;
            $candidate->distance_formatted = DistanceHelper::formatDistance($distance, $unit);
            return $candidate;
        })
            ->when($maxDistance !== null, function ($collection) use ($maxDistance) {
                return $collection->filter(function ($candidate) use ($maxDistance) {
                    return $candidate->distance !== null && $candidate->distance <= $maxDistance;
                });
            })
            ->sortBy('distance');
    }

    /**
     * Get candidates within a certain radius of a job offer
     * 
     * @param JobOffer $jobOffer
     * @param float $radius
     * @param string $unit
     * @return \Illuminate\Support\Collection
     */
    public function getCandidatesWithinRadius(JobOffer $jobOffer, $radius, $unit = 'km')
    {
        $candidates = User::role('candidate')->with('city')->get();

        return $this->enrichCandidatesWithDistance($jobOffer, $candidates, $unit, $radius);
    }

    /**
     * Get job offers within a certain radius of a candidate
     * 
     * @param User $candidate
     * @param float $radius
     * @param string $unit
     * @return \Illuminate\Support\Collection
     */
    public function getJobOffersWithinRadius(User $candidate, $radius, $unit = 'km')
    {
        $jobOffers = JobOffer::with('city')->get();

        return $this->enrichJobOffersWithDistance($candidate, $jobOffers, $unit, $radius);
    }
}
