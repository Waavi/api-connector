<?php

namespace Waavi\ApiConnector;

use GuzzleHttp\Client;
use Waavi\ApiConnector\ApiConnector;
use Illuminate\Support\ServiceProvider as LaravelProvider;

class ServiceProvider extends LaravelProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/apiconnector.php', 'apiconnector');

        $client = new Client([
            'base_uri' => env('CONNECTOR_BASE_URI') . '/', // TODO: move this to config with fallback to env
            'timeout'  => 8.0,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . env('CONNECTOR_ACCESS_TOKEN'), // TODO: move this to config with fallback to env
            ],
        ]);

        $this->app->bind(ApiConnector::class, function($app) use ($client) {
            return new ApiConnector($client, $app);
        });
    }

}