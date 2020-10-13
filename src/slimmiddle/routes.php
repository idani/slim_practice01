<?php

use SocymSlim\SlimMiddle\controllers\SlimMiddleController;
use SocymSlim\SlimMiddle\middlewares\BeforeAndAfter;
use SocymSlim\SlimMiddle\middlewares\RecordIPAddress;
use SocymSlim\SlimMiddle\middlewares\RecordIPAddressBefore;

$app->setBasePath('/slimmiddle/public');

$app->any('/doRecordIPAddress', SlimMiddleController::class.':middlewareTest')
    ->add(new RecordIPAddress())
    ->add(new RecordIPAddressBefore())
    ->add(new BeforeAndAfter())
    ;
