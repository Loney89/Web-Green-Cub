<?php

namespace GreenCub\Models;

use Silex\Application;

class Blog
{
    /**
     * Look man, this is pretty dumb kai?
     */
    public function randomString(Application $app)
    {
        $call = 'SELECT * FROM `random_string`';
        $random = $app['db']->fetchAll($call);

        $random_value = array_rand($random);

        return $random[$random_value]['string'];
    }
}