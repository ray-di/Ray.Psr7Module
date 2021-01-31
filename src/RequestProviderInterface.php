<?php

declare(strict_types=1);

namespace Ray\HttpMessage;

use Psr\Http\Message\ServerRequestInterface;

interface RequestProviderInterface
{
    public function get(): ServerRequestInterface;
}
