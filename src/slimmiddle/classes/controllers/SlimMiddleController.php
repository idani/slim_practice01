<?php


namespace SocymSlim\SlimMiddle\controllers;


use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SlimMiddleController
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function middlewareTest(ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface
    {
        $content = '<p>ミドルウェアのテスト。こちらはリクエスト処理。</p>';
        $responseBody = $response->getBody();
        $responseBody->write($content);

        return $response;
    }
}