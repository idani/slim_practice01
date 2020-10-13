<?php

use DI\Container;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;


$container = new Container();
$container->set('view', function() {
    $twig = Twig::create($_SERVER['DOCUMENT_ROOT'] . '/slimmiddle/templates');
    return $twig;
});

$container->set('logger',
    function () {
        $logger = new Logger('slimmiddle');
        $fileHandler = new StreamHandler($_SERVER['DOCUMENT_ROOT'] . '/slimmiddle/logs/app.log');
        $logger->pushHandler($fileHandler);
        return $logger;
    }
);

AppFactory::setContainer($container);