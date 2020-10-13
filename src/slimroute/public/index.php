<?php

use Slim\Factory\AppFactory;

require_once($_SERVER['DOCUMENT_ROOT'] . '/slimroute/vendor/autoload.php');

$app = AppFactory::create();

require_once($_SERVER['DOCUMENT_ROOT'] . '/slimroute/routes.php');

$app->run();