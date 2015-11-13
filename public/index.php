<?php
require_once '../classes/init.class.php';


/**
 * Created by PhpStorm.
 * User: brian
 * Date: 11/13/15
 * Time: 11:50 AM
 */
function dispHome(){
    include_once TEMPLATES.DS.'layout.phtml';
}
function disp404(){
    ob_clean();
    header('HTTP/1.0 404');
    require_once PAGES.DS.'404.php';
}
function disp500(){
    require_once PAGES.DS.'500.php';
}
$path=Functions::get_path();
//Functions::print_prep($path);

if(count($path['call_parts'])>1){
    switch ($path['call_parts'][1]){

    }
}else{

}

//define main container template name
    #if not exist-> 404
$view=($path['call_utf8']=='')?'main':$path['call_utf8'];
$header=true;
$footer=true;
if(!(file_exists(VIEWS.DS.$view.'.phtml')|file_exists(VIEWS.DS.$view.'.php'))){
    disp404();
    exit();
}

//run php script
include_once VIEWS.DS.$view.'.php';

//include layout
    //cache start
include_once TEMPLATES.DS.'layout.phtml';
    //cache end

/** @noinspection PhpIncludeInspection */
/*if(!include_once PAGES . DS . $path['call_utf8'] . '.php') {
    disp404();
    exit();
}*/

?>