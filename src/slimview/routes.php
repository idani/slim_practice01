<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->setBasePath('/slimview/public');

$app->any('/getDataByJson/{id}', function (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface{
    $id = $args['id'];
    $jsonArray = [
        'id' => $id,
        'name' => '井谷',
        'age' => 36
    ];
    $jsonData = json_encode($jsonArray);
    $responseBody = $response->getBody();
    $responseBody->write($jsonData);
    $response = $response->withHeader('Content-Type', 'application/json');

    return $response;
});