<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Base Url
    |--------------------------------------------------------------------------
    |
    | The base url of the API to consume.
    |
    */

    'base_url' => env('CONNECTOR_BASE_URL', ''),

    /*
    |--------------------------------------------------------------------------
    | HTTP Headers
    |--------------------------------------------------------------------------
    |
    | The HTTP headers to be send along in each call
    |
    */

    'headers' => [
        'Accept'        => 'application/json',
        'Authorization' => env('CONNECTOR_ACCESS_TOKEN', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | Connector Timeout
    |--------------------------------------------------------------------------
    |
    | The time in seconds the connector should wait before erroring
    |
    */

    'timeout' => 8.0,

    /*
    |--------------------------------------------------------------------------
    | Connector Cache Mode
    |--------------------------------------------------------------------------
    |
    | Whether or not should the connector cache the api responses.
    | Disabling this could lead to performance drops but it will
    | assure that you always get the latest data.
    |
    */

    'cache' => true,

];
