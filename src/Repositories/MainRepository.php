<?php
namespace Waavi\ApiConnector\Repositories;

use Waavi\ApiConnector\Repositories\ApiRepository;
use Waavi\ApiConnector\Repositories\CacheRepository;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;

class MainRepository
{
    public function __construct(Client $client)
    {
        $this->apiRepository = new ApiRepository($client);
        $this->cacheRepository = new CacheRepository($this->apiRepository);
    }

    public function get($key, $parameters = [])
    {
        $data = $this->cacheRepository->get($key, $parameters);
        return $data;
    }

}
