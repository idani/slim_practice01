<?php


namespace SocymSlim\SlimMiddle\middlewares;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class BeforeAndAfter implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        print('<p>リクエスト処理の前のミドルウェア</p>');

        $response = $handler->handle($request);

        $content = '<p>リクエスト処理の後のミドルウェア</p>';
        $responseBody = $response->getBody();
        $responseBody->write($content);

        return $response;
    }
}