<?php

require_once __DIR__.'/vendor/autoload.php';

//Microframeworks yo,
$app = new Silex\Application();

//Setup the config first
$config = new GreenCub\Api\Lib\AppConfig($app);

//Then run the core shit
$core = new GreenCub\Api\Lib\AppCore($app);

//Then log it's working, like durh.
$app['monolog']->addInfo('System Initialised');

//Run!
$app->run();