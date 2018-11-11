<?php
namespace Ray\HttpMessage;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Ray\Di\Injector;
use Swoole\Http\Request;

class Psr7SwooleModuleTest extends TestCase
{
    public function testPsr7SwooleModule()
    {
        $injector = new Injector(new Swoole7HttpModule());
        /* @var RequestProviderInterface $requestProvider */
        $requestProvider = $injector->getInstance(RequestProviderInterface::class);
        $swooleContainer = $injector->getInstance(SwooleRequestContainer::class);
        $request = new Request;
        $request->get = [];
        $request->post = [];
        $request->server = [
            'request_method' => 'GET',
            'request_uri' => '/',
            'path_info' => '/',
        ];
        $request->header = [
        ];
        $request->cookie = [];
        $swooleContainer->set($request);
        $request = @$requestProvider->get();
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
