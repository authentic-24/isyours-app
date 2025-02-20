<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

class CompanyProfileService
{


    public function create(array $data)
    {
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . session('access_token'),
                'Accept' => 'application/json',
            ]
        ]);

        //dd($client);
        try {
            $response = $client->post(route('api.company_profile.store'), [
                'json' => $data,
            ]);
        } catch (ClientException $e) {

            if ($e->getResponse()->getStatusCode() === 401) {
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
                $error['error'] = true;
                return $error;
            }

            if ($e->getResponse()->getStatusCode() === 422) {
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
                $error['error'] = true;
                return $error;
            }


            throw $e;
        }

        return json_decode($response->getBody(), true);
    }

    
   
    /**
     *    Retrieve job offers from API using an HTTP client.
     *   @return array|mixed|string
     *   @throws GuzzleException
     */
    // public function getOffers()
    // {
    //     // Create a new HTTP client with specific headers.
    //     $client = new Client([
    //         'headers' => [
    //             'Authorization' => 'Bearer ' . session('access_token'),
    //             'Accept' => 'application/json',
    //         ]
    //     ]);

    //     try {
    //         // Send a GET request to the job offers endpoint.
    //         $response = $client->get(route('joboffers.index'));
    //     } catch (ClientException $e) {
    //         // Handle the unauthorized exception by returning an error array.
    //         if ($e->getResponse()->getStatusCode() === 401) {
    //             $error = json_decode($e->getResponse()->getBody()->getContents(), true);
    //             $error['error'] = true;
    //             $error['code'] = 401;
    //             return $error;
    //         }
    //         // If the exception is not unauthorized, throw it again.
    //         throw $e;
    //     }

    //     // Return the response body as an array.
    //     return json_decode($response->getBody(), true);
    // }

    // /**
    //  *    Retrieve job offers from API using an HTTP client.
    //  *   @return array|mixed|string
    //  *   @throws GuzzleException
    //  */
    // public function getOfferById($offer_id)
    // {
    //     // Create a new HTTP client with specific headers.
    //     $client = new Client([
    //         'headers' => [
    //             'Authorization' => 'Bearer ' . session('access_token'),
    //             'Accept' => 'application/json',
    //         ]
    //     ]);

    //     try {
    //         // Send a GET request to the job offers endpoint.
    //         $response = $client->get(route('joboffers.show', $offer_id));
    //     } catch (ClientException $e) {
    //         // Handle the unauthorized exception by returning an error array.
    //         if ($e->getResponse()->getStatusCode() === 401 || $e->getResponse()->getStatusCode() === 404) {
    //             $error = json_decode($e->getResponse()->getBody()->getContents(), true);
    //             $error['error'] = true;
    //             $error['code'] = $e->getResponse()->getStatusCode();
    //             return $error;
    //         }
    //         // If the exception is not unauthorized, throw it again.
    //         throw $e;
    //     }

    //     // Return the response body as an array.
    //     return json_decode($response->getBody(), true);
    // }

    // public function applyToOffer($offerId)
    // {
    //     // Create a new HTTP client with specific headers.
    //     $client = new Client([
    //         'headers' => [
    //             'Authorization' => 'Bearer ' . session('access_token'),
    //             'Accept' => 'application/json',
    //         ]
    //     ]);

    //     try {
    //         // Send a POST request to the apply endpoint.
    //         $response = $client->post(route('api.job-offer.apply', $offerId));
    //     } catch (ClientException $e) {
    //         // Handle the unauthorized exception by returning an error array.
    //         if ($e->getResponse()->getStatusCode() === 401) {
    //             $error = json_decode($e->getResponse()->getBody()->getContents(), true);
    //             $error['error'] = true;
    //             $error['code'] = 401;
    //             return $error;
    //         }
    //         if ($e->getResponse()->getStatusCode() === 422) {
    //             $error = json_decode($e->getResponse()->getBody()->getContents(), true);
    //             $error['error'] = true;
    //             $error['code'] = 422;
    //             return $error;
    //         }
    //         // If the exception is not unauthorized, throw it again.
    //         throw $e;
    //     }

    //     // Return the response body as an array.
    //     return json_decode($response->getBody(), true);
    // }

    // public function get_latest_offers()
    // {
    //     // Create a new HTTP client with specific headers.
    //     $client = new Client([
    //         'headers' => [
    //             'Authorization' => 'Bearer ' . session('access_token'),
    //             'Accept' => 'application/json',
    //         ]
    //     ]);

    //     try {
    //         // Send a POST request to the apply endpoint.
    //         $response = $client->get(route('get_latest_offers'));
    //     } catch (ClientException $e) {
    //         // Handle the unauthorized exception by returning an error array.
    //         if ($e->getResponse()->getStatusCode() === 401) {
    //             $error = json_decode($e->getResponse()->getBody()->getContents(), true);
    //             $error['error'] = true;
    //             $error['code'] = 401;
    //             return $error;
    //         }
    //         if ($e->getResponse()->getStatusCode() === 422) {
    //             $error = json_decode($e->getResponse()->getBody()->getContents(), true);
    //             $error['error'] = true;
    //             $error['code'] = 422;
    //             return $error;
    //         }
    //         // If the exception is not unauthorized, throw it again.
    //         throw $e;
    //     }

    //     // Return the response body as an array.
    //     return json_decode($response->getBody(), true);
    // }



}