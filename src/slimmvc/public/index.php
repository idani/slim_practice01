<?php


use Slim\Factory\AppFactory;

require_once($_SERVER['DOCUMENT_ROOT'] . '/slimmvc/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/slimmvc/containerSetups.php');

$app = AppFactory::create();
require_once($_SERVER['DOCUMENT_ROOT'] . '/slimmvc/routes.php');
$app->run();