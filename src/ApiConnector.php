<?php

namespace Waavi\ApiConnector;

use Waavi\ApiConnector\Repositories\MainRepository as Repository;
use Illuminate\Foundation\Application;
use GuzzleHttp\Client;

class ApiConnector
{
    protected $repository;

    public function __construct(Client $client, Application $app)
    {
        $this->repository = new Repository($client, $app);
    }

    public function get($key, $parameters = [])
    {
        $data = $this->repository->get($key, $parameters);
        return $data;
    }
}