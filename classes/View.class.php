<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 12/30/15
 * Time: 3:29 PM
 */

/**
 * Class View
 * @property Controller $controller
 */
class View{
    public $header=true;
    public $footer=true;
    public $view_name;
    private $script_file;
    private $main_is_file;
    public $data;
    public $controller;

    /**
     * @param $controller Controller
     */
    function __construct($controller){
        $this->controller=$controller;
    }

    function has_header($t){
        $this->header=$t;
    }
    function has_footer($t){
        $this->footer=$t;
    }
    function script($script_file){
        $this->script_file=$script_file;
    }
    function main_template($template,$is_file=true){
        $this->view_name=$template;
        $this->main_is_file=$is_file;
        return;
    }
    function get_main(){
        //Functions::print_prep($this);exit;
        //Functions::print_prep($this);exit;
        if($this->main_is_file){
            require_once VIEWS.DS.$this->view_name.'.phtml';
        }else{
            echo $this->view_name;
        }

    }
    function setData($key,$value,$overwrite=true){
        if(!$overwrite && array_key_exists($key,$this->data)){
            return;
        }
        $this->data[$key]=$value;
    }
    function getData($key){
        return $this->data[$key];
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
    function render($run_script){
        //todo start response

        global $session;


        if($this->main_is_file) {
            $view_file_markup = VIEWS . DS . $this->view_name . '.phtml';
            $view_file_script = SCRIPTS . DS . $this->view_name . '.php';

            if (!(file_exists($view_file_markup) | file_exists($view_file_script))) {
                //dispNoView();

                $error=new LayoutError("View File Missing Error.");
                $error->setMessage(
                    'View file :[ '.$view_file_markup.' ] missing.<br>
                     View script:[ '.$view_file_script.' ] missing.<br>
                     Please correct the <b>view</b> name in <b>'.get_class($this->controller).' </b>controller.
                    '
                );
                $this->view_name = $error->getViewName();
                $this->data['LayoutError']=$error;
                //exit();
            }
        }

        if($run_script) {
            //run php script
            /** @noinspection PhpIncludeInspection */
            include_once SCRIPTS . DS . $this->script_file . '.php';
        }
        /** @noinspection PhpIncludeInspection */
        include_once TEMPLATES.DS.'layout.phtml';

        //todo end response

    }
}