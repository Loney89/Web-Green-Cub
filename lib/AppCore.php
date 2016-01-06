<?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 05/01/2016
 * Time: 20:40
 */

namespace GreenCub\Lib;

use Silex\Application;


class AppCore
{
    /**
     * AppCore constructor.
     * @param $app
     */
    public function __construct($app)
    {
        $this->setupComponents();
        $this->setupSilexProviders($app);
        $this->setupModels($app);
        $this->setupControllers($app);
        $this->setupRouting($app);
    }

    public function setupComponents()
    {
        $app['guzzle.comp'] = new \GuzzleHttp\Client();
    }

    /**
     * Setting up Providers we'll be using
     *
     * @param $app
     */
    public function setupSilexProviders($app)
    {
        $app->register(new \Silex\Provider\MonologServiceProvider(), array(
            'monolog.logfile' => __DIR__.'../../logs/dev.log',
        ));

        $app->register(new \Silex\Provider\TwigServiceProvider(), array(
            'twig.path' => __DIR__.'../../public/',
            'twig.cache' => __DIR__.'../../public/tmp',
            'twig.charset' => 'utf-8',
            'twig.debug' => $app['debug']
        ));

        $app->register(new \Silex\Provider\DoctrineServiceProvider(), array(
            'db.options' => array(
                'driver'    => 'pdo_mysql',
                'host'      => $app['db.host'],
                'dbname'    => $app['db.name'],
                'user'      => $app['db.username'],
                'password'  => $app['db.password'],
                'charset'   => $app['db.charset']
            ),
        ));
    }

    /**
     * Setting up the models
     *
     * @param $app
     */
    public function setupModels($app)
    {

        // Database Connect
        $app['db.models'] = $app->share(function(){
            return new \GreenCub\Models\DatabaseConnection();
        });

        // Blog
        $app['blog.models'] = $app->share(function(){
           return new \GreenCub\Models\Blog();
        });

        // Login
        $app['login.models'] = $app->share(function(){
            return new \GreenCub\Models\Login();
        });

        // User
        $app['login.user'] = $app->share(function(){
            return new \GreenCub\Models\User();
        });

    }

    /**
     * Here we'll setup the controllers!
     *
     * @param $app
     */
    public function setupControllers($app)
    {
        // Error
        // Blog
        // Admin
        // Login
        // Home
        $app['home.controller'] = $app->share(function(){
           return new \GreenCub\Controllers\Home();
        });

    }

    /**
     * Using the Controllers we can then setup the routing
     *
     * @param $app
     */
    public function setupRouting($app)
    {
        //Home Page
        $app->get('/', 'GreenCub\Controllers\Home::getHome');

        //Blog Pages
        $app->get('/blog/article/{id}','GreenCub\Controllers\Blog::getBlog');
        $app->get('/blog/article/last','GreenCub\Controllers\Blog::getLast');
        $app->get('/blog/article/{month}','GreenCub\Controllers\Blog::getMonth');
        $app->post('/blog/article/create/', 'GreenCub\Controllers\Blog::createBlog');
        $app->post('/blog/article/edit/', 'GreenCub\Controllers\Blog::editBlog');
        $app->post('/blog/article/delete/', 'GreenCub\Controllers\Blog::deleteBlog');

        //Error pages
        $app->get('/blog/article/', 'GreenCub\Controllers\Error::getBlog');
    }

}