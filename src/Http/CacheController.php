<?php

namespace Waavi\ApiConnector\Http;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class CacheController extends BaseController
{
    public function flush()
    {
        Cache::flush();
    }
}