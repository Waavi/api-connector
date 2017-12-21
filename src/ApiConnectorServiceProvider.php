<?php

namespace Waavi\ApiConnector;

use GuzzleHttp\Client;
use Waavi\ApiConnector\ApiConnector;
use Illuminate\Support\ServiceProvider as LaravelProvider;

class ApiConnectorServiceProvider extends LaravelProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/apiconnector.php' => config_path('apiconnector.php'),
        ]);

        $this->app->bind(ApiConnector::class, function($app) {
            $client = new Client([
                'base_uri' => $app['config']->get('apiconnector.base_url'),
                'timeout'  => $app['config']->get('apiconnector.timeout'),
                'headers' => $app['config']->get('apiconnector.headers'),
            ]);
            return new ApiConnector($client, $app);
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/apiconnector.php', 'apiconnector');
    }

}