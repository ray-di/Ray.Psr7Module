<?php
namespace Ray\HttpMessage;

use Psr\Http\Message\RequestInterface;

interface RequestProviderInterface
{
    public function get() : RequestInterface;
}
