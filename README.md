# Api Connector

A Laravel package to consume and cache API calls.

WAAVI is a web development studio based in Madrid, Spain. You can learn more about us at [waavi.com](http://waavi.com)

### Installing

Require through Composer

```bash
composer require waavi/api-connector dev-master
```

Or manually edit your composer.json file

```json
"require": {
    "waavi/api-connector": "dev-master"
}
```

### Configuration

Once installed, edit your config/app.php add the following entry to the providers array:

```
Waavi\ApiConnector\ApiConnectorServiceProvider::class
```

### Usage

Once installed and configured you will be able to make API calls using the ApiConnector interface like so:

```php
<?php

namespace App\Http\Controllers;

use Waavi\ApiConnector\ApiConnector;

class HomeControllerController extends Controller
{
    protected $connector;

    public function __construct(ApiConnector $connector)
    {
        $this->connector = $connector;
    }

    public function index()
    {
        // A GET call to https://someapi.com/v1/resource
        $resourcesList = $this->connector->get('resource');

        // A GET call to https://someapi.com/v1/resource?size=20&page=3
        $otherResourcesList = $this->connector->get('resource', ['size=20', 'page=3']);

        // A GET call to https://someapi.com/v1/resource/{id}
        $resource = $this->connector->get('resource/1');

        return view('web.home')->with(compact('resourcesList', 'otherResourcesList', 'resource'));
    }
}
```

By default, the calls will be cached and retrieved from the cache on subsequent calls. If you wish to disable this behaviour just edit your config.

## Built With

* [Guzzle](https://github.com/guzzle/guzzle) - An extensible PHP HTTP client
* [Illuminate\Database](https://github.com/illuminate/database) - Subtree split of the Illuminate Database component
* [Illuminate\Support](https://github.com/illuminate/support) - Subtree split of the Illuminate Support component

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## xkcd because yes
![IMAGE](https://imgs.xkcd.com/comics/api.png )
