<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->setBasePath('/slimroute/public');

$app->post('/helloPost', function (ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
    print('POST de Hello World!');
    return $response;
});

$app->post('/showParams', function (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface {
    $postParams = $request->getParsedBody();
    $name = $postParams['name'];
    $age = $postParams['age'];
    print(sprintf('送信されたパラメータ:名前は、%sで年齢が%s', $name, $age));
    return $response;
});

/**
 * https://localhost/slimroute/public/showParams?name=%E4%BA%95%E8%B0%B7&age=23
 */
$app->get('/showParams', function (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface {
    $postParams = $request->getQueryParams();
    $name = $postParams['name'];
    $age = $postParams['age'];
    print(sprintf('送信されたパラメータ:名前は、%sで年齢が%s', $name, $age));
    return $response;
});

$app->get('/writeBody', function (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface {
    $content = 'レスポンスボディに文字列を格納';
    $responseBody = $response->getBody();
    $responseBody->write($content);
    return $response;
});

$app->any('/helloAny', function (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface {
    $method = $request->getMethod();
    $content = $method . 'メソッドでHello World!';
    $responseBody = $response->getBody();
    $responseBody->write($content);
    return $response;
});

$app->map(['POST', 'GET'], '/helloMap', function (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface{
    $content = 'POSTまたはGETメソッドでHello World！';
    $responseBody = $response->getBody();
    $responseBody->write($content);
    return $response;
});

$app->get('/showDetail/{id}', function (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface{
   $id = $args['id'];
   $content = 'idが'. $id.'の詳細です！';
   $responseBody = $response->getBody();
   $responseBody->write($content);
   return  $response;
});

$app->get('/showList/{categoryId}/{tagId}[/{listSize}]', function (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface{
    $categoryId = $args['categoryId'];
    $tagId = $args['tagId'];
    $listSize = isset($args['listSize'])? $args['listSize']: '<未設定>';
    $content = sprintf("カテゴリID:%s\nタグID:%s\nリストサイズ:%s", $categoryId, $tagId, $listSize);
    $responseBody = $response->getBody();
    $responseBody->write($content);
    return  $response;
});

$app->redirect('/google', 'https://www.google.com/');

$app->redirect('/hey', '/slimroute/public/helloAny', 301);

$app->any('/redirectOrNot/{flg}', function (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface{
   $flg = $args['flg'];
   if ($flg == 0) {
       $response = $response->withHeader('Location', 'https://www.google.com/');
       $response = $response->withStatus(302);
   } else {
       $content = 'リダイレクトしない';
       $responseBody = $response->getBody();
       $responseBody->write($content);
   }

   return $response;
});