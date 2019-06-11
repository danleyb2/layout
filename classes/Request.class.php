<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 12/31/15
 * Time: 7:56 AM
 */

namespace core;
use core\Controller;

/**
 * Class Request
 * @package core
 * @property Controller $controller
 */
class Request {
    public $params=array();
    private $method;
    private $controller;

    public $get;
    public $post;
    public $files;

    function __construct($controller){
        $this->method=$_SERVER['REQUEST_METHOD'];
        $this->get=$_GET;
        $this->post=$_POST;
        $this->files=$_FILES;
        $this->controller=$controller;

        //$this->route_request();
    }
    private function methodIs($is){
        return $this->method===$is;
    }

    /**
     *
     */
    public function route_request(){
        //if(!$this->methodIs('GET')){return;}
        //\Functions::print_prep($this);
        $this->controller->all($this);
        switch ($this->method) {
            case 'GET':
                //echo 'GET req';
                $this->controller->get($this);
                break;
            case 'POST':
                $this->controller->post($this);
                break;
            case 'PUT':
                $this->controller->put($this);
                break;
            case 'PATCH':
                $this->controller->patch($this);
                break;
            case 'DELETE':
                $this->controller->delete($this);
                break;
            default://todo throw exception
                exit();
                break;
        }


    }

}
class RequestBase extends Request{

}