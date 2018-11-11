<?php
namespace Ray\HttpMessage;

use FastD\Http\ServerRequest;
use Psr\Http\Message\RequestInterface;

final class HttpRequestProvider implements RequestProviderInterface
{
    public function get() : RequestInterface
    {
        return ServerRequest::createServerRequestFromGlobals();
    }
}
