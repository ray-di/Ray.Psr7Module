<?php
namespace Ray\HttpMessage;

use Ray\Di\AbstractModule;
use Ray\Di\Scope;

class Swoole7HttpModule extends AbstractModule
{
    protected function configure()
    {
        $this->bind(RequestProviderInterface::class)->to(SwooleRequestProvider::class);
        $this->bind(SwooleRequestContainer::class)->in(Scope::SINGLETON);
    }
}
