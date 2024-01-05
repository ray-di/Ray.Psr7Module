<?php

declare(strict_types=1);

namespace Ray\HttpMessage;

use Psr\Http\Message\UriInterface;
use Ray\Di\ProviderInterface;

/** @implements ProviderInterface<UriInterface> */
final class UriProvider implements ProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function get()
    {
        return (new HttpRequestProvider())->get()->getUri();
    }
}
