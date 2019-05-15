<?php
namespace Ray\HttpMessage;

use Nyholm\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UploadedFileInterface;
use Psr\Http\Message\UriInterface;
use Ray\Di\Injector;
use Ray\HttpMessage\Annotation\UploadFiles;

class Psr7HttpModuleTest extends TestCase
{
    public function testPsr7HttpModule()
    {
        $injector = new Injector(new Psr7Module);
        /* @var RequestProviderInterface $requestProvider */
        $requestProvider = $injector->getInstance(RequestProviderInterface::class);
        $_SERVER = $this->superGlobalsServer() + $_SERVER;
        $request = $requestProvider->get();
        $this->assertInstanceOf(ServerRequestInterface::class, $request);
    }

    public function testPsr7ServerRequestTest()
    {
        $injector = new Injector(new Psr7Module);
        /* @var ServerRequest $serverRequest */
        $serverRequest = $injector->getInstance(ServerRequest::class);
        $this->assertInstanceOf(ServerRequest::class, $serverRequest);
    }

    public function testPsr7ServerRequestInterfaceTest()
    {
        $injector = new Injector(new Psr7Module);
        /* @var ServerRequest ServerRequestInterface */
        $serverRequest = $injector->getInstance(ServerRequestInterface::class);
        $this->assertInstanceOf(ServerRequestInterface::class, $serverRequest);
    }

    public function testPsr7UriTest()
    {
        $injector = new Injector(new Psr7Module);
        /* @var UriInterface $uri */
        $uri = $injector->getInstance(UriInterface::class);
        $this->assertInstanceOf(UriInterface::class, $uri);
    }

    public function testPsr7UploadFilesTest()
    {
        $_FILES = $this->files();
        $injector = new Injector(new Psr7Module);
        $files = $injector->getInstance('', UploadFiles::class);
        $file = $files['my-form']['details']['avatar'][2];
        /* @var UploadedFileInterface $file */
        $this->assertInstanceOf(UploadedFileInterface::class, $file);
        $this->assertSame('my-avatar3.png', $file->getClientFilename());
    }

    public function superGlobalsServer()
    {
        return  [
            'REQUEST_METHOD' => 'POST',
            'REQUEST_URI' => '/foo/bar',
            'QUERY_STRING' => 'abc=123&foo=bar',
            'SERVER_NAME' => 'example.com',
            'CONTENT_TYPE' => 'multipart/form-data'
        ];
    }

    public function files()
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
