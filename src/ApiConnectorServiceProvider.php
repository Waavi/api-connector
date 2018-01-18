<?php

namespace Waavi\ApiConnector;

use GuzzleHttp\Client;
use Waavi\ApiConnector\ApiConnector;
use Illuminate\Support\ServiceProvider as LaravelProvider;

class ApiConnectorServiceProvider extends LaravelProvider
{
    public function boot()
    {
        require __DIR__ . '/routes.php';

        $this->publishes([
            __DIR__ . '/../config/apiconnector.php' => config_path('apiconnector.php'),
        ]);

        $this->app->bind(ApiConnector::class, function($app) {
            $config = $app['config']['apiconnector'];
            $client = new Client([
                'base_uri' => $config['base_url'],
                'timeout'  => $config['timeout'],
                'headers' => $config['headers'],
            ]);
            return new ApiConnector($client, $config);
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/apiconnector.php', 'apiconnector');
    }

}