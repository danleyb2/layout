<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 12/31/15
 * Time: 8:41 AM
 */

namespace core;


abstract Class Controller{
    /**
     * runs on all methods.
     * @return mixed
     */
    abstract function all($req);
    abstract function get($req);
    abstract function post($req);
    abstract function put($req);
    abstract function patch($req);
    abstract function delete($req);
    abstract function head($req);
}