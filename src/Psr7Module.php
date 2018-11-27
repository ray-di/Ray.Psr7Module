<?php
namespace Ray\HttpMessage;

use Nyholm\Psr7\ServerRequest;
use Ray\Di\AbstractModule;

class Psr7Module extends AbstractModule
{
    protected function configure()
    {
        $this->bind(RequestProviderInterface::class)->to(HttpRequestProvider::class);
        $this->bind(ServerRequest::class)->toProvider(HttpRequestRayProvider::class);
    }
}
