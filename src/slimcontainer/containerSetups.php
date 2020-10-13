<?php

use DI\Container;
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

AppFactory::setContainer($container);