<?php
namespace Ray\HttpMessage;

use Ray\Di\AbstractModule;

class Psr7HttpModule extends AbstractModule
{
    protected function configure()
    {
        $this->bind(RequestProviderInterface::class)->to(HttpRequestProvider::class);
    }
}
