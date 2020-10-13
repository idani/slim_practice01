<?php

use SocymSlim\SlimController\controllers\ConstructorController;
use SocymSlim\SlimController\controllers\ServerHelloController;

$app->setBasePath('/slimcontroller/public');

$app->any('/several/showFirst', ServerHelloController::class . ':showFirst');
$app->any('/several/showSecond', ServerHelloController::class . ':showSecond');

$app->any('/constructor/helloWithContainer', ConstructorController::class . ':helloWithContainer');
