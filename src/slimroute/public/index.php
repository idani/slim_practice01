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

$app->post('/slimroute/public/showParams', function (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface {
    $postParams = $request->getParsedBody();
    $name = $postParams['name'];
    $age = $postParams['age'];
    print(sprintf('送信されたパラメータ:名前は、%sで年齢が%s', $name, $age));
   return $response;
});

/**
 * https://localhost/slimroute/public/showParams?name=%E4%BA%95%E8%B0%B7&age=23
 */
$app->get('/slimroute/public/showParams', function (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface {
    $postParams = $request->getQueryParams();
    $name = $postParams['name'];
    $age = $postParams['age'];
    print(sprintf('送信されたパラメータ:名前は、%sで年齢が%s', $name, $age));
    return $response;
});

$app->run();