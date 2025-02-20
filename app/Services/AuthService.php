<?php

namespace App\Services;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class AuthService
{

    public function login(array $data)
    {
        $client = new Client();
        try {
            $response = $client->post(route('api.login'), [
                'json' => $data,
            ]);
        } catch (ClientException $e) {

            if ($e->getResponse()->getStatusCode() === 401) {
                $error = json_decode($e->getResponse()->getBody()->getContents(), true);
                $error['error'] = true;
                return $error;
            }

            throw $e;
        }

        return json_decode($response->getBody(), true);
    }

    public function register(array $data)
    {
        $client = new Client();
        try {
            $response = $client->post(route('api.register'), [
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
}
