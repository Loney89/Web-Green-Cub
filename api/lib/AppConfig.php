<?php
/**
 * Set a bunch of options in this file, like....
 */

namespace GreenCub\Api\Lib;

use Silex\Application;


class AppConfig
{
    public function __construct($app)
    {
        date_default_timezone_set('UTC');

        //Environment mode
        $app['mode'] = 'dev';
        //Do we want debugging on?
        $app['debug'] = true;

        //Database creds
        if ($app['mode'] == 'dev') {
            $app['db.host'] = 'localhost';
            $app['db.name'] = 'green_cub';
            $app['db.username'] = 'admin';
            $app['db.password'] = '';
            $app['db.charset'] = 'utf8';
        } else {
            $app['db.host'] = 'localhost';
            $app['db.name'] = 'green_cub';
            $app['db.username'] = 'admin';
            $app['db.password'] = '';
            $app['db.charset'] = 'utf8';
        }

        //Pathing to assets
        $app['css_path'] = 'public/assets/css/';
        $app['css_thirdparty'] = $app['css_path'].'thirdparty/';
        $app['js_path'] = 'public/assets/js/';
        $app['js_thirdparty'] = $app['js_path'].'thirdparty/';
        $app['image_path'] ='public/assets/images/';

    }


}