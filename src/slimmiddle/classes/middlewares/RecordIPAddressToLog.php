<?php


namespace SocymSlim\SlimMiddle\middlewares;


use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RecordIPAddressToLog implements MiddlewareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $serverParams = $request->getServerParams();
        $ipAddress = $serverParams['REMOTE_ADDR'];
        $path = $serverParams['REQUEST_URI'];
        $content = 'IPアドレスは' . $ipAddress . 'でパスは、' . $path;

        $logger = $this->container->get('logger');
        $logger->info($content);

        $response = $handler->handle($request);

        return $response;
    }
}