<?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 05/01/2016
 * Time: 21:17
 */

namespace GreenCub\Controllers;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Error
{
    public function getBlog(Application $app, Request $request)
    {
        $app['monolog']->addInfo('There was no blog to be found sire');
        return $app['twig']->render('error_blog.twig');
    }

}