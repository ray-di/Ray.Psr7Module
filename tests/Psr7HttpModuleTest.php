<?php

declare(strict_types=1);

namespace Ray\HttpMessage;

use Nyholm\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UploadedFileInterface;
use Psr\Http\Message\UriInterface;
use Ray\Di\Injector;
use Ray\HttpMessage\Annotation\UploadFiles;

use function assert;

class Psr7HttpModuleTest extends TestCase
{
    public function testPsr7HttpModule(): void
    {
        $injector = new Injector(new Psr7Module());
        $requestProvider = $injector->getInstance(RequestProviderInterface::class);
        assert($requestProvider instanceof RequestProviderInterface);
        $_SERVER = $this->superGlobalsServer() + $_SERVER;
        $request = $requestProvider->get();
        $this->assertInstanceOf(ServerRequestInterface::class, $request);
    }

    public function testPsr7ServerRequestTest(): void
    {
        $injector = new Injector(new Psr7Module());
        $serverRequest = $injector->getInstance(ServerRequest::class);
        assert($serverRequest instanceof ServerRequest);
        $this->assertInstanceOf(ServerRequest::class, $serverRequest);
    }

    public function testPsr7ServerRequestInterfaceTest(): void
    {
        $injector = new Injector(new Psr7Module());
        /** @var ServerRequestInterface $serverRequest */
        $serverRequest = $injector->getInstance(ServerRequestInterface::class);
        $this->assertInstanceOf(ServerRequestInterface::class, $serverRequest);
    }

    public function testPsr7UriTest(): void
    {
        $injector = new Injector(new Psr7Module());
        $uri = $injector->getInstance(UriInterface::class);
        assert($uri instanceof UriInterface);
        $this->assertInstanceOf(UriInterface::class, $uri);
    }

    public function testPsr7UploadFilesTest(): void
    {
        $_FILES = $this->files();
        $injector = new Injector(new Psr7Module());
        $files = $injector->getInstance('', UploadFiles::class);
        $file = $files['my-form']['details']['avatar'][2]; // @phpstan-ignore-line
        /** @var UploadedFileInterface $file */ //@phpcs:ignore SlevomatCodingStandard.Commenting.InlineDocCommentDeclaration.NoAssignment
        $this->assertInstanceOf(UploadedFileInterface::class, $file);
        $this->assertSame('my-avatar3.png', $file->getClientFilename());
    }

    /**
     * @return array<string>tests/Psr7HttpModuleTest.php
     */
    public function superGlobalsServer(): array
    {
        return [
            'REQUEST_METHOD' => 'POST',
            'REQUEST_URI' => '/foo/bar',
            'QUERY_STRING' => 'abc=123&foo=bar',
            'SERVER_NAME' => 'example.com',
            'CONTENT_TYPE' => 'multipart/form-data',
        ];
    }

    /**
     * @return array<string, array<mixed>>
     */
    public function files(): array
    {
        return [
            'my-form' => [
                'name' => [
                    'details' => [
                        'avatar' => [
                            0 => 'my-avatar.png',
                            1 => 'my-avatar2.png',
                            2 => 'my-avatar3.png',
                        ],
                    ],
                ],
                'type' => [
                    'details' => [
                        'avatar' => [
                            0 => 'image/png',
                            1 => 'image/png',
                            2 => 'image/png',
                        ],
                    ],
                ],
                'tmp_name' => [
                    'details' => [
                        'avatar' => [
                            0 => 'phpmFLrzD',
                            1 => 'phpV2pBil',
                            2 => 'php8RUG8v',
                        ],
                    ],
                ],
                'error' => [
                    'details' => [
                        'avatar' => [
                            0 => 0,
                            1 => 0,
                            2 => 0,
                        ],
                    ],
                ],
                'size' => [
                    'details' => [
                        'avatar' => [
                            0 => 90996,
                            1 => 90996,
                            2 => 90996,
                        ],
                    ],
                ],
            ],
        ];
    }
}
