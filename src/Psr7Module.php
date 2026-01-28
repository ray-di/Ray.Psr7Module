<?php

declare(strict_types=1);

namespace Ray\HttpMessage;

use Nyholm\Psr7\ServerRequest;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriInterface;
use Ray\Di\AbstractModule;
use Ray\Di\Scope;
use Ray\HttpMessage\Annotation\UploadFiles;

class Psr7Module extends AbstractModule
{
    protected function configure()
    {
        $this->bind(RequestProviderInterface::class)->to(HttpRequestProvider::class);
        $this->bind(ServerRequest::class)->toProvider(HttpRequestRayProvider::class)->in(Scope::SINGLETON);
        $this->bind(ServerRequestInterface::class)->toProvider(HttpRequestRayProvider::class)->in(Scope::SINGLETON);
        $this->bind(UriInterface::class)->toProvider(UriProvider::class)->in(Scope::SINGLETON);
        $this->bind()->annotatedWith(UploadFiles::class)->toProvider(UploadfilesProvider::class)->in(Scope::SINGLETON);
    }
}
