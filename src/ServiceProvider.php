<?php

namespace Waavi\ApiConnector;

use GuzzleHttp\Client;
use Waavi\ApiConnector\ApiConnector;
use Illuminate\Support\ServiceProvider as LaravelProvider;

class ServiceProvider extends LaravelProvider
{
    public function boot()
    {
        $client = new Client([
            'base_uri' => env('BASE_URI') . '/api/' . env('API_VERSION') . '/', // TODO: move this to config with fallback to env
            'timeout'  => 8.0,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . env('ACCESS_TOKEN'), // TODO: move this to config with fallback to env
            ],
        ]);

        $this->app->bind(ApiConnector::class, function() use ($client) {
            return new ApiConnector($client);
        });
    }

}