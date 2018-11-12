<?php
namespace Ray\HttpMessage;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Message\ServerRequestInterface;

final class HttpRequestProvider implements RequestProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function get() : ServerRequestInterface
    {
        $psr17Factory = new Psr17Factory;
        $serverRequest = (new ServerRequestCreator(
            $psr17Factory, // ServerRequestFactory
            $psr17Factory, // UriFactory
            $psr17Factory, // UploadedFileFactory
            $psr17Factory  // StreamFactory
        ))->fromGlobals();

        return $serverRequest;
    }
}
