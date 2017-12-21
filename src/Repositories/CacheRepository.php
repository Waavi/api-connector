<?php

namespace Waavi\ApiConnector\Repositories;

use Illuminate\Support\Facades\Cache;
use Waavi\ApiConnector\Contracts\RemoteRepositoryContract;

class CacheRepository
{
    protected $apiRepository;

    public function __construct(ApiRepository $apiRepository)
    {
        $this->apiRepository = $apiRepository;
    }

    public function get($key, $parameters = [])
    {
        $parametersList = implode('&', (array) $parameters);
        $data = Cache::rememberForever("$key?$parametersList", function() use ($key, $parameters) {
            return $this->apiRepository->get($key, $parameters);
        });

        return $data;
    }
}
