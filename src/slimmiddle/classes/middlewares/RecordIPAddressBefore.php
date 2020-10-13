<?php


namespace SocymSlim\SlimMiddle\middlewares;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RecordIPAddressBefore implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $serverParams = $request->getServerParams();
        $ipAddress = $serverParams['REMOTE_ADDR'];
        $path = $serverParams['REQUEST_URI'];

        print('<p>IPアドレスは' . $ipAddress . 'でパスは、' . $path . '</p>');

        $response = $handler->handle($request);

        return $response;
    }
}