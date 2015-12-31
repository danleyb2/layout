<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 12/30/15
 * Time: 4:37 PM
 */

//echo "REQUEST PARAMS";
//Functions::print_prep($request);

//print_r($request);
use core\Controller;

#require_once '/home/brian/PhpstormProjects/Layout/classes/controller.class.php';
class Test extends Controller
{
    function get($req)
    {

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

    /**
     * runs on all methods.
     * @return mixed
     */
    function all($req)
    {
        // TODO: Implement all() method.
        Functions::print_prep($req);
    }
}
