<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Str;

class ApiClient
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('movie.movie_endpoint'),
        ]);
    }

    public function get(string $method, string $url)
    {
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . trim(str_replace("\n", "", config('movie.access_token'))),
            ],
        ];

        if (Str::endsWith($method, 'Async')) {
            $response = $this->client->requestAsync($method, $url, $options);
        } else {
            $response = $this->client->request($method, $url, $options);
        }

        return json_decode($response->getBody()->getContents());
    }
}
