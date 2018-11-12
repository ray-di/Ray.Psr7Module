<?php
namespace Ray\HttpMessage;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Ray\Di\Injector;

class Psr7HttpModuleTest extends TestCase
{
    public function testPsr7HttpModule()
    {
        $injector = new Injector(new Psr7Module);
        /* @var RequestProviderInterface $requestProvider */
        $requestProvider = $injector->getInstance(RequestProviderInterface::class);
        $_SERVER = $this->superGlobalsServer();
        $request = $requestProvider->get();
        $this->assertInstanceOf(RequestInterface::class, $request);
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
}
