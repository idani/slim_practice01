<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

$app->setBasePath('/slimcontainer/public');

$app->any('/helloWithContainer', function (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface{
   $assign['name'] = 'コンテナ！！';
   $twig = $this->get('view');
   $response = $twig->render($response, 'helloWithVals.html', $assign);

   return $response;
});