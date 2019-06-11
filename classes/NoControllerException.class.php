<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 1/1/16
 * Time: 4:44 PM
 */

class NoControllerException extends Exception{
    private $controller_file;
    private $route;
    public function setControllerFile($controller_file)
    {
        $this->controller_file=$controller_file;
    }

    /**
     * @return String
     */
    public function getControllerFile()
    {
        return $this->controller_file;
    }

    /**
     * @param mixed $route
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }


    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }
}