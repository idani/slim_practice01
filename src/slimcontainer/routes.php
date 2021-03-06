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

$app->any('/newNote[/{name}]', function (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface {
   $name = isset($args['name'])? $args['name'] . 'さん' : '井谷さん';
   $note = $this->call('note', [$name]);
   return $response;
});

$app->any('/writeToLog', function (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface{
   $logger = $this->get('logger');
   $logger->info('ログに書き出しました。');
   $content = 'ログ書き出し';
   $responseBody = $response->getBody();
   $responseBody->write($content);

   return $response;
});