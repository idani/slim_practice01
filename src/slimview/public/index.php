<?php

use Slim\Factory\AppFactory;

require_once($_SERVER['DOCUMENT_ROOT'] . '/slimview/vendor/autoload.php');
$app = AppFactory::create();
require_once($_SERVER['DOCUMENT_ROOT'] . '/slimview/routes.php');
$app->run();