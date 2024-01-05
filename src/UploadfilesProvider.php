<?php

declare(strict_types=1);

namespace Ray\HttpMessage;

use Psr\Http\Message\UploadedFileInterface;
use Ray\Di\ProviderInterface;

/** @implements ProviderInterface<array<UploadedFileInterface>> */
final class UploadfilesProvider implements ProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function get()
    {
        $files = (new HttpRequestProvider())->get()->getUploadedFiles(); // @phpcs:ignore SlevomatCodingStandard.Variables.UselessVariable.UselessVariable
        /** @var array<UploadedFileInterface> $files */

        return $files;
    }
}
