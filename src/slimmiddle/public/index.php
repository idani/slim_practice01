<?php


use Slim\Factory\AppFactory;

require_once($_SERVER['DOCUMENT_ROOT'] . '/slimmiddle/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/slimmiddle/containerSetups.php');

$app = AppFactory::create();
require_once($_SERVER['DOCUMENT_ROOT'] . '/slimmiddle/routes.php');
$app->run();