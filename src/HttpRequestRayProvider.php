<?php

declare(strict_types=1);

namespace Ray\HttpMessage;

use Psr\Http\Message\ServerRequestInterface;
use Ray\Di\ProviderInterface;

/**
 * @implements ProviderInterface<ServerRequestInterface>
 * @deprecated
 * @codeCoverageIgnore
 */
final class HttpRequestRayProvider implements ProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function get()
    {
        return (new HttpRequestProvider())->get();
    }
}
