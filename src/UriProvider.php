<?php
namespace Ray\HttpMessage;

use Ray\Di\ProviderInterface;

final class UriProvider implements ProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function get()
    {
        return (new HttpRequestProvider)->get()->getUri();
    }
}
