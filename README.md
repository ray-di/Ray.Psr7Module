# Ray.Psr7Module

## Overview

`Ray.Psr7Module` provides `RequestProvider` object to get the implementation of [PSR7 Request interface](https://github.com/php-fig/http-message/blob/master/src/ServerRequestInterface.php).

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

````php
class Foo
{
    /**
     * @var \Psr\Http\Message\ServerRequestInterface
     */
    private $request;

    public function __construct(RequestProviderInterface $requestProvider)
    {
        $this->request = requestProvider->get();
        // retrieve cookies
        $cookie = $this->request->getServerParams(); // $_COOKIE
    }
}
````