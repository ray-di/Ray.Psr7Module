<?php
namespace Ray\HttpMessage;

use Nyholm\Psr7\ServerRequest;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriInterface;
use Ray\Di\AbstractModule;
use Ray\HttpMessage\Annotation\UploadFiles;

class Psr7Module extends AbstractModule
{
    protected function configure()
    {
        $this->bind(RequestProviderInterface::class)->to(HttpRequestProvider::class);
        $this->bind(ServerRequest::class)->toProvider(HttpRequestRayProvider::class);
        $this->bind(ServerRequestInterface::class)->toProvider(HttpRequestRayProvider::class);
        $this->bind(UriInterface::class)->toProvider(UriProvider::class);
        $this->bind()->annotatedWith(UploadFiles::class)->toProvider(UploadfilesProvider::class);
    }
}
