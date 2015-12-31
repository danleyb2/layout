<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 12/30/15
 * Time: 3:29 PM
 */

class View{
    public $header=true;
    public $footer=true;
    public $view_name;

    function __construct($view_name=''){
        $this->view_name=$view_name;
    }

    function has_header($t){
        $this->header=$t;
    }
    function has_footer($t){
        $this->footer=$t;
    }

    function create($view_name){
        //define main container template name
        #if not exist-> 404
        $this->view_name=$view_name;


        //include layout
        //start caching
        /** @noinspection PhpIncludeInspection */
        #include_once TEMPLATES.DS.'layout.phtml';
        //caching end
    }
    function render(){
        global $session;
        $view=$this->view_name;

        if(!(file_exists(VIEWS.DS.$view.'.phtml')|file_exists(SCRIPTS.DS.$view.'.php'))){
            disp404();
            exit();
        }

        //run php script
        /** @noinspection PhpIncludeInspection */
        include_once SCRIPTS.DS.$view.'.php';
        include_once TEMPLATES.DS.'layout.phtml';

    }
}