<?php


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;

require_once($_SERVER['DOCUMENT_ROOT'] . '/slimroute/vendor/autoload.php');

$app = AppFactory::create();
$app->post('/slimroute/public/helloPost', function (ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
    print('POST de Hello World!');
    return $response;
});

$app->run();