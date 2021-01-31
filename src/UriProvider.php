<?php

declare(strict_types=1);

namespace Ray\HttpMessage;

use Ray\Di\ProviderInterface;

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
