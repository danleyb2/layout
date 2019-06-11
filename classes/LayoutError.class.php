<?php

/**
 * Created by PhpStorm.
 * User: brian
 * Date: 1/1/16
 * Time: 3:31 PM
 */

class LayoutError {
    private $message,$heading;
    private $view_name='error';

    function __construct($error_heading){
        $this->heading=$error_heading;

    }
    function setHeading($heading){
        $this->heading=$heading;
    }
    function setMessage($message){
        $this->message=$message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getHeading()
    {
        return $this->heading;
    }

    public function getViewName()
    {
        return $this->view_name;
    }

    /**
     * @param mixed $view_name
     */
    public function setViewName($view_name='error')
    {
        $this->view_name = $view_name;
    }

}