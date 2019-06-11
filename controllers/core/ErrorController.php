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
class ErrorController extends Controller
{
    /**
     * runs on all methods.
     * @return mixed
     */
    function all($req)
    {
        // TODO: Implement all() method.
        //require_once CONFIG.DS.'config.php';
        //$connection=new Database();
    }
    function get($req)
    {
        //global $message;
        //echo $message;exit;
        $view=new View($this);
        $view->data['LayoutError']=$this->data['LayoutError'];
        $view->create('error');//todo render error view
        $view->has_header(true);
        $view->has_footer(true);
        $view->main_template('error',true);
        #$view->cache();
        $view->render(false);
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
