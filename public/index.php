<?php
require_once '../classes/init.class.php';


/**
 * Created by PhpStorm.
 * User: brian
 * Date: 11/13/15
 * Time: 11:50 AM
 */
function dispHome(){
    /** @noinspection PhpIncludeInspection */
    include_once TEMPLATES.DS.'layout.phtml';
}
function disp404(){
    ob_clean();
    header('HTTP/1.0 404');
    /** @noinspection PhpIncludeInspection */
    require_once PAGES.DS.'404.php';
}
function disp500(){
    /** @noinspection PhpIncludeInspection */
    require_once PAGES.DS.'500.php';
}
$path=Functions::get_path();

if(!$session->is_logged_in()){$path['call_utf8']='login';}
if(isset($_SERVER['HTTP_AJAX'])){
    ob_clean();
    echo 'ajax';
    $function=$path['call_parts'][0].'_friend';
    $ajax=new Ajax();
    echo is_callable(array($ajax,$function))?call_user_func($ajax->{$function}($path['call_parts'][1])):'Wrong action';

    exit();
}
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
/** @noinspection PhpIncludeInspection */
include_once VIEWS.DS.$view.'.php';

//include layout
    //start caching
/** @noinspection PhpIncludeInspection */
include_once TEMPLATES.DS.'layout.phtml';
    //caching end

?>