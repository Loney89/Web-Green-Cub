<?php

namespace GreenCub\Api\Controllers;

use Silex\Application;


class Home
{
    public function getHome(Application $app)
    {
        $app['monolog']->addInfo('Loaded homepage');

        return $app['twig']->render('home.twig');
    }

}