<?php

namespace App\Helpers;

class DistanceHelper
{
    /**
     * Calculate distance between two geographic coordinates using Haversine formula
     * 
     * @param float $lat1 Latitude of first point
     * @param float $lon1 Longitude of first point
     * @param float $lat2 Latitude of second point
     * @param float $lon2 Longitude of second point
     * @param string $unit Unit of measurement: 'km' for kilometers, 'mi' for miles
     * @return float Distance in the specified unit
     */
    public static function calculateDistance($lat1, $lon1, $lat2, $lon2, $unit = 'km')
    {
        if (is_null($lat1) || is_null($lon1) || is_null($lat2) || is_null($lon2)) {
            return null;
        }

        // Convert degrees to radians
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        // Haversine formula
        $deltaLat = $lat2 - $lat1;
        $deltaLon = $lon2 - $lon1;

        $a = sin($deltaLat / 2) * sin($deltaLat / 2) +
            cos($lat1) * cos($lat2) *
            sin($deltaLon / 2) * sin($deltaLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        // Earth's radius in kilometers
        $earthRadius = 6371;

        $distance = $earthRadius * $c;

        // Convert to miles if requested
        if ($unit === 'mi') {
            $distance = $distance * 0.621371;
        }

        return round($distance, 2);
    }

    /**
     * Format distance with appropriate unit
     * 
     * @param float|null $distance Distance value
     * @param string $unit Unit of measurement
     * @return string Formatted distance string
     */
    public static function formatDistance($distance, $unit = 'km')
    {
        if (is_null($distance)) {
            return 'N/A';
        }

        $unitLabel = $unit === 'mi' ? 'mi' : 'km';

        if ($distance < 1) {
            $meters = round($distance * 1000);
            return $meters . ' m';
        }

        return $distance . ' ' . $unitLabel;
    }
}
