<?php
namespace Ray\HttpMessage;

use Psr\Http\Message\ServerRequestInterface;

interface RequestProviderInterface
{
    public function get() : ServerRequestInterface;
}
