<?php


namespace SocymSlim\SlimController\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ServerHelloController
{
    public function showFirst(ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface
    {
        $content = 'コントローラクラスのshowFirstメソッドでHello World!!';
        $responseBody = $response->getBody();
        $responseBody->write($content);

        return $response;
    }

    public function showSecond(ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface
    {
        $content = 'コントローラクラスのshowSecondメソッドでHello World!!';
        $responseBody = $response->getBody();
        $responseBody->write($content);

        return $response;
    }
}