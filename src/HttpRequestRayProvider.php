<?php
namespace Ray\HttpMessage;

use Ray\Di\ProviderInterface;

final class HttpRequestRayProvider implements ProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function get()
    {
        return (new HttpRequestProvider)->get();
    }
}
