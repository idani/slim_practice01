<?php

use SocymSlim\SlimController\controllers\ServerHelloController;

$app->setBasePath('/slimcontroller/public');

$app->any('/several/showFirst', ServerHelloController::class . ':showFirst');
$app->any('/several/showSecond', ServerHelloController::class . ':showSecond');