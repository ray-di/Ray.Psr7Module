<?php
namespace Ray\HttpMessage;

use FastD\Http\SwooleServerRequest;
use Psr\Http\Message\RequestInterface;

final class SwooleRequestProvider implements RequestProviderInterface
{
    /**
     * @var SwooleRequestContainer
     */
    private $container;

    public function __construct(SwooleRequestContainer $container)
    {
        $this->container = $container;
    }

    public function get() : RequestInterface
    {
        return SwooleServerRequest::createServerRequestFromSwoole($this->container->get());
    }
}
