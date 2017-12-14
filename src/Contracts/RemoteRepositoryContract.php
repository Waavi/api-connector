<?php

namespace Waavi\ApiConnector\Contracts;

interface RemoteRepositoryContract
{
    public function get($key, $parameters = []);
}
