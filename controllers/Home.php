<?php

namespace GreenCub\Controllers;

use Silex\Application;


class Home
{
    public function getHome(Application $app)
    {
        $app['monolog']->addInfo('Loaded homepage');

        return $app['twig']->render('home.twig');
    }

}