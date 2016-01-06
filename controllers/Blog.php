<?php

namespace GreenCub\Controllers;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Blog
{
    public function getBlog(Application $app, $id)
    {
        $app['monolog']->addInfo('Loaded blog page');

        $call = "SELECT * FROM blog_details WHERE id = ?";
        $blog_details = $app['db']->fetchAssoc($call, array((int) $id));

        if ($blog_details == false || $blog_details['visible'] == 0) {

            return $app['twig']->render('error_blog.twig');

        } else {

            $app['blog_title'] = $blog_details['title'];
            $app['blog_description'] = $blog_details['description'];
            $app['blog_created'] = $blog_details['created'];
            $app['blog_likes'] = $blog_details['likes'];
            $app['blog_dislikes'] = $blog_details['dislikes'];

            $call = "SELECT * FROM blog_contents WHERE blog_id = ?";

            $blog_contents = $app['db']->fetchAssoc($call, array((int) $blog_details['id']));

            if ($blog_contents == false) {
                return $app['twig']->render('error_blog.twig');
            } else {

                $app['blog_contents'] = $blog_contents['contents'];
                $app['blog_updated'] = $blog_contents['updated'];

                return $app['twig']->render('blog.twig');
            }


        }


    }

    public function getLast(Application $app)
    {

    }

    public function getMonth(Application $app, $month)
    {

    }

    public function createBlog(Application $app, Request $request)
    {

    }

    public function editBlog(Application $app, Request $request)
    {

    }

    public function deleteBlog(Application $app, Request $request)
    {

    }
}