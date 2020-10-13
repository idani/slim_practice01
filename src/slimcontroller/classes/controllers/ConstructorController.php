<?php


namespace SocymSlim\SlimController\controllers;


use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ConstructorController
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function helloWithContainer(ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface
    {
        $assign['name'] = 'コントローラ';
        $twig = $this->container->get('view');
        $response = $twig->render($response, 'helloWithVals.html', $assign);

        return $response;
    }
}