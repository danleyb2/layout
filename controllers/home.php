<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 12/30/15
 * Time: 3:07 PM
 */

//print_r($request);
use core\Controller;

#require_once '/home/brian/PhpstormProjects/Layout/classes/controller.class.php';
class Home extends Controller
{
    /**
     * runs on all methods.
     * @return mixed
     */
    function all($req)
    {

        /** @noinspection PhpIncludeInspection */
        require_once CONFIG.DS.'config.php';
        $connection=new Database();
    }
    function get($req)
    {
        $view=new View();
        $view->create('main');
        $view->has_header(true);
        $view->has_footer(true);
        #$view->cache();
        $view->render();
    }

    function post($req)
    {
        // TODO: Implement post() method.
    }

    function put($req)
    {
        // TODO: Implement put() method.
    }

    function patch($req)
    {
        // TODO: Implement patch() method.
    }

    function delete($req)
    {
        // TODO: Implement delete() method.
    }

    function head($req)
    {
        // TODO: Implement head() method.
    }


}
