<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeocodingService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.google_maps.api_key');
    }

    /**
     * Geocode an address to get latitude and longitude
     * 
     * @param string $address Full address string
     * @return array|null ['latitude' => float, 'longitude' => float] or null if failed
     */
    public function geocodeAddress(string $address)
    {
        if (empty($address) || empty($this->apiKey)) {
            return null;
        }

        try {
            $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
                'address' => $address,
                'key' => $this->apiKey,
            ]);

            $data = $response->json();

            if ($data['status'] === 'OK' && !empty($data['results'])) {
                $location = $data['results'][0]['geometry']['location'];

                return [
                    'latitude' => $location['lat'],
                    'longitude' => $location['lng'],
                    'formatted_address' => $data['results'][0]['formatted_address'],
                ];
            }

            Log::warning('Geocoding failed', [
                'address' => $address,
                'status' => $data['status'],
            ]);

            return null;
        } catch (\Exception $e) {
            Log::error('Geocoding exception', [
                'address' => $address,
                'error' => $e->getMessage(),
            ]);

            return null;
        }
    }

    /**
     * Build full address from components
     * 
     * @param array $components
     * @return string
     */
    public function buildAddress(array $components): string
    {
        $parts = array_filter([
            $components['address'] ?? '',
            $components['city'] ?? '',
            $components['state'] ?? '',
            $components['zip_code'] ?? '',
            $components['country'] ?? '',
        ]);

        return implode(', ', $parts);
    }

    /**
     * Geocode and update model with coordinates
     * 
     * @param mixed $model Model instance (User, JobOffer, CompanyProfile)
     * @param string|null $address Optional address, will try to build from model if not provided
     * @return bool Success status
     */
    public function geocodeAndUpdateModel($model, ?string $address = null): bool
    {
        // Build address from model if not provided
        if (!$address) {
            if ($model instanceof \App\Models\User) {
                $address = $this->buildAddress([
                    'address' => $model->address,
                    'city' => $model->city->name ?? '',
                    'state' => $model->city->state->name ?? '',
                    'zip_code' => $model->zip_code,
                    'country' => 'USA', // or get from model
                ]);
            } elseif ($model instanceof \App\Models\JobOffer) {
                $address = $this->buildAddress([
                    'address' => $model->full_address,
                    'city' => $model->city->name ?? '',
                    'state' => $model->city->state->name ?? '',
                    'zip_code' => $model->zip_code,
                    'country' => 'USA',
                ]);
            } elseif ($model instanceof \App\Models\CompanyProfile) {
                $address = $this->buildAddress([
                    'address' => $model->address,
                    'city' => $model->city,
                    'state' => $model->state,
                    'zip_code' => $model->zip_code,
                    'country' => $model->country,
                ]);
            }
        }

        if (!$address) {
            return false;
        }

        $coordinates = $this->geocodeAddress($address);

        if ($coordinates) {
            $model->latitude = $coordinates['latitude'];
            $model->longitude = $coordinates['longitude'];

            if (property_exists($model, 'full_address') && !$model->full_address) {
                $model->full_address = $coordinates['formatted_address'];
            }

            return $model->save();
        }

        return false;
    }

    /**
     * Reverse geocode coordinates to get address
     * 
     * @param float $latitude
     * @param float $longitude
     * @return array|null
     */
    public function reverseGeocode(float $latitude, float $longitude)
    {
        if (empty($this->apiKey)) {
            return null;
        }

        try {
            $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
                'latlng' => "{$latitude},{$longitude}",
                'key' => $this->apiKey,
            ]);

            $data = $response->json();

            if ($data['status'] === 'OK' && !empty($data['results'])) {
                return [
                    'formatted_address' => $data['results'][0]['formatted_address'],
                    'address_components' => $data['results'][0]['address_components'],
                ];
            }

            return null;
        } catch (\Exception $e) {
            Log::error('Reverse geocoding exception', [
                'latitude' => $latitude,
                'longitude' => $longitude,
                'error' => $e->getMessage(),
            ]);

            return null;
        }
    }
}
