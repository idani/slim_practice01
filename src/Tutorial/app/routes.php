<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->setBasePath('/Tutorial/public');

    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->get('/idani', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world! 井谷！！！');
        return $response;
    });


    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/wii', function (Group $group) {
       $group->get('', function (Request $request, Response $response) {
         $response->getBody()->write('wii list');
         return$response;
       });
    });

    $app->get('/wii2', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world! wii2');
        return $response;
    });
};
