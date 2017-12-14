<?php
namespace Waavi\ApiConnector\Repositories;

use Illuminate\Support\Facades\Cache;
use Waavi\ApiConnector\Contracts\RemoteRepositoryContract;
use GuzzleHttp\Client;

class ApiRepository implements RemoteRepositoryContract
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get($key, $parameters = [])
    {
        $response = $this->client->request('GET', $key, ['query' => $parameters]);
        $data = json_decode($response->getBody()->getContents())->data;

        if (is_null($data)) {
            // EXPLODE
            return 'explosion';
        }

        return $data;
    }

}
