<?php

namespace Waavi\ApiConnector\Repositories;

use Waavi\ApiConnector\Repositories\ApiRepository;
use Waavi\ApiConnector\Repositories\CacheRepository;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;

class MainRepository
{
    protected $config;
    protected $apiRepository;
    protected $cacheRepository;

    public function __construct(Client $client, $config)
    {
        $this->apiRepository   = new ApiRepository($client);
        $this->cacheRepository = new CacheRepository($this->apiRepository);
        $this->config          = $config;
    }

    public function get($key, $parameters = [])
    {
        if ($this->config['cache']) {
            $data = $this->cacheRepository->get($key, $parameters);
        } else {
            $data = $this->apiRepository->get($key, $parameters);
        }

        return $data;
    }

    public function post($key, $parameters = [])
    {
        $data = $this->apiRepository->post($key, $parameters);
        return $data;
    }
}
