# Ray.Psr7Module
[![Type Coverage](https://shepherd.dev/github/ray-di/Ray.Psr7Module/UploadFiles.php/coverage.svg)](https://shepherd.dev/github/bearsunday/BEAR.Package)

[![Code Coverage](https://scrutinizer-ci.com/g/ray-di/Ray.Psr7Module/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ray-di/Ray.Psr7Module/?branch=master)
[![Type Coverage](https://shepherd.dev/github/ray-di/Ray.Psr7Module/coverage.svg)](https://shepherd.dev/github/ray-di/Ray.Psr7Module)
![Continuous Integration](https://github.com/ray-di/Ray.Psr7Module/workflows/Continuous%20Integration/badge.svg)

## Overview

`Ray.Psr7Module` provides `RequestProvider` to get the [PSR7 ServerRequest](https://github.com/php-fig/http-message/blob/master/src/ServerRequestInterface.php) object.

## Installation

### Composer install

    $ composer require ray/psr7-module

### Module install

```php
use Ray\Di\AbstractModule;
use Ray\Psr7Module;

class AppModule extends AbstractModule
{
    protected function configure()
    {
        $this->install(new Psr7Module);
    }
}
```

## Usage

### ServerRequest (general)

````php
class Foo
{
    public function __construct(ServerRequestInterface $serverRequest)
    {
        // retrieve cookies
        $cookie = $serverRequest->getCookieParams(); // $_COOKIE
    }
}
````

### URI
````php

use Psr\Http\Message\UriInterface;

class Foo
{
    public function __construct(UriInterface $uri)
    {
        // retrieve host name
        $host = $uri->getHost();
    }
}
````

### Upload Files

````php

use Psr\Http\Message\UploadedFileInterface;
use Ray\HttpMessage\Annotation\UploadFiles;

class Foo
{
    /**
     * @UploadFiles
     */
    public function __construct(array $files)
    {
        // retrieve file name
        $file = $files['my-form']['details']['avatar'][0]
        /* @var UploadedFileInterface $file */
        $name = $file->getClientFilename(); // my-avatar3.png
    }
}
````
