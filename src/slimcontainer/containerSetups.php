<?php

use DI\Container;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;

require_once($_SERVER['DOCUMENT_ROOT'] . '/slimcontainer/Note.php');

$container = new Container();
$container->set('view', function() {
    $twig = Twig::create($_SERVER['DOCUMENT_ROOT'] . '/slimcontainer/templates');
    return $twig;
});

$container->set('note',
    \DI\value(function(string $name) {
       $note = new Note($name);
       return $note;
    })
);

$container->set('logger',
    function () {
        $logger = new Logger('slimcontainer');
        $fileHandler = new StreamHandler($_SERVER['DOCUMENT_ROOT'] . '/slimcontainer/logs/app.log');
        $logger->pushHandler($fileHandler);
        return $logger;
    }
);

AppFactory::setContainer($container);