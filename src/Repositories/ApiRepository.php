<?php
namespace Waavi\ApiConnector\Repositories;

use Illuminate\Support\Facades\Cache;
use Waavi\ApiConnector\Contracts\RemoteRepositoryContract;
use GuzzleHttp\Client;

class ApiRepository
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get($key, $parameters = [])
    {
        $parametersList = implode('&', (array) $parameters);
        $response = $this->client->request('GET', $key, ['query' => $parametersList]);
        $data = json_decode($response->getBody()->getContents())->data;

        if (is_null($data)) {
            // EXPLODE
            return 'explosion';
        }

        return $data;
    }

    public function post($key, $parameters = [])
    {
        $response = $this->client->request('POST', $key, ['form_params' => $parameters]);
        $data = json_decode($response->getBody()->getContents())->data;

        if (is_null($data)) {
            // EXPLODE
            return 'explosion';
        }

        return $data;
    }

}
