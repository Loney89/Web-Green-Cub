<?php
/**
 * Set a bunch of options in this file, like....
 */

namespace GreenCub\Lib;

use Silex\Application;


class AppConfig
{
    public function __construct($app)
    {
        //Update this when I come up with a better name yo.
        $app['application_name'] = "Web-Green-Cub";

        date_default_timezone_set('UTC');

        //Helps for re-routing the public directories.
        define("ROOT", "/../".$app['application_name']."/");

        //Environment mode
        $app['mode'] = 'dev';
        //Do we want debugging on?
        $app['debug'] = true;

        //Database creds
        if ($app['mode'] == 'dev') {
            $app['db.host'] = 'localhost';
            $app['db.name'] = 'greencub';
            $app['db.username'] = 'root';
            $app['db.password'] = '';
            $app['db.charset'] = 'utf8';
        } else {
            $app['db.host'] = 'localhost';
            $app['db.name'] = 'greencub';
            $app['db.username'] = 'root';
            $app['db.password'] = '';
            $app['db.charset'] = 'utf8';
        }

        $app['public_path'] = ROOT.'public/';

        //Pathing to assets
        $app['css_path'] = $app['public_path'].'assets/css/';
        $app['css_thirdparty'] = $app['css_path'].'thirdparty/';
        $app['js_path'] = $app['public_path'].'assets/js/';
        $app['js_thirdparty'] = $app['js_path'].'thirdparty/';
        $app['image_path'] = $app['public_path'].'/assets/images/';

    }


}