<?php
namespace Ray\HttpMessage;

use Ray\Di\AbstractModule;

class Psr7Module extends AbstractModule
{
    protected function configure()
    {
        $this->bind(RequestProviderInterface::class)->to(HttpRequestProvider::class);
    }
}
