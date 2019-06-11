<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 1/1/16
 * Time: 4:44 PM
 */

class NoControllerException extends Exception{
    private $controller_file;
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
}