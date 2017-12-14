<?php

namespace Waavi\ApiConnector;

use Waavi\ApiConnector\Repositories\MainRepository as Repository;
use GuzzleHttp\Client;

class ApiConnector
{
    protected $repository;

    public function __construct(Client $client)
    {
        $this->repository = new Repository($client);
    }

    public function get($key, $parameters = [])
    {
        $data = $this->repository->get($key, $parameters);
        return $data;
    }
}