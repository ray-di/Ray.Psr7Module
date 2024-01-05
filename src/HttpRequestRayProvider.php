<?php

declare(strict_types=1);

namespace Ray\HttpMessage;

use Psr\Http\Message\ServerRequestInterface;
use Ray\Di\ProviderInterface;

/** @implements ProviderInterface<ServerRequestInterface> */
final class HttpRequestRayProvider implements ProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function get()
    {
        return (new HttpRequestProvider())->get();
    }
}
