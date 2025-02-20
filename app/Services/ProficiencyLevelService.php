<?php 

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

class ProficiencyLevelService
{
    /**
     * Retrieve proficiency levels from API using an HTTP client.
     *
     * @return array|mixed|string
     * @throws GuzzleException
     */
    public function getProficiencyLevels()
    {
        // Create a new HTTP client with specific headers.
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . session('access_token'),
                'Accept' => 'application/json',
            ]
        ]);

        try {
            // Send a GET request to the proficiency levels endpoint.
            $response = $client->get(route('proficiencylevel.index'));
        } catch (ClientException $e) {
            // Handle the unauthorized exception by returning an error array.
            if ($e->getResponse()->getStatusCode() === 401) {
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
                $error['error'] = true;
                $error['code'] = 401;
                return $error;
            }
            // If the exception is not unauthorized, throw it again.
            throw $e;
        }

        // Return the response body as an array.
        return json_decode($response->getBody(), true);
    }
}
