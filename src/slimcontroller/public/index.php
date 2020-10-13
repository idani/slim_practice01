<?php


use Slim\Factory\AppFactory;

require_once($_SERVER['DOCUMENT_ROOT'] . '/slimcontroller/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/slimcontroller/containerSetups.php');

$app = AppFactory::create();
require_once($_SERVER['DOCUMENT_ROOT'] . '/slimcontroller/routes.php');
$app->run();