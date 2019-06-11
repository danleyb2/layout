<?php
use core\Request;

require_once '../classes/Init.class.php';


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
function dispNoController($e ){
    $route = $e->getRoute();
    $controller_file = $e->getControllerFile();

    $error=new LayoutError("No Controller Error.");
    //$error->setHeading("No Controller Error.");
    $error->setMessage(
        'No controller available called :[ '.$route.' ]<br>'.
        'Controller file searched for the class was ['.$controller_file.']  .<b> It doesn\'t Exist</b>'
    );

    $controller='ErrorController';
    /** @noinspection PhpIncludeInspection */
    require_once CONTROLLERS . DS . 'core' .DS. $controller.'.php';
    $controller_obj=new $controller();
    $controller_obj->data['error']=$error;
    $request=new Request($controller_obj);
    $request->route_request();

}
function disp404($resource){
    ob_clean();
    header('HTTP/1.0 404 Not Found');
    /** @noinspection PhpIncludeInspection */
    require_once PAGES.DS.'404.php';
}
function disp500(){
    ob_clean();
    header('HTTP/1.0 500 Internal Server Error');
    /** @noinspection PhpIncludeInspection */
    require_once PAGES.DS.'500.php';
}
function serve_static($file){
    $f=$file[0];
    //Functions::print_prep($file);
    echo file_get_contents($f);
    exit();
}
$path=Functions::get_path();

#if(!$session->is_logged_in()){$path['call_utf8']='login';}
if(isset($_SERVER['HTTP_AJAX'])){
    ob_clean();

    $function=$path['call_parts'][0].'_friend';
    
    $ajax=new Ajax();
    echo is_callable(array($ajax,$function))?call_user_func( array($ajax,$function),($path['call_parts'][1]) ):'Wrong action';
    ob_end_flush();
    exit();
}
if(count($path['call_parts'])>1){
    switch ($path['call_parts'][1]){

    }
}else{

}
#$input_line='public/img/me.css';
$output_array=array();
preg_match("/(.*\.(css|img|js)$)/", $path['path'], $output_array);
//Functions::print_prep($path);
if(!empty($output_array)){
    serve_static($output_array);
}
#echo 'it works';
#echo SITE_ROOT.DS.'_router/router.php';

$routes=array();
$router=new Router($routes);
require_once SITE_ROOT.DS.'_router/routes.php';
try {
    $router->run();
}catch (NoControllerException $e){
    dispNoController($e);

}catch (NoRouteException $e){
    disp404($e->getMessage());
}
exit();

//define main container template name

?>