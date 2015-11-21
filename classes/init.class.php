<?php

final class Init{
    function __construct(){
        global $session;
        error_reporting(E_ALL|E_STRICT);
        $this->define_configs();
        spl_autoload_register(array($this,'classLoader'));

        $session = new Session();


    }
    private function define_configs(){
        defined('DS')?:define('DS',DIRECTORY_SEPARATOR);
        defined('SITE_ROOT')?:define('SITE_ROOT',dirname(__DIR__));
        defined('CONFIG')?:define('CONFIG',SITE_ROOT.DS.'config');
        defined('PUBLIC')?:define('PUBLIC',SITE_ROOT.DS.'public');
        defined('CLASSES')?:define('CLASSES',SITE_ROOT.DS.'classes');
        defined('PAGES')?:define('PAGES',SITE_ROOT.DS.'pages');
        defined('VIEWS')?:define('VIEWS',SITE_ROOT.DS.'views');
        defined('SCRIPTS')?:define('SCRIPTS',SITE_ROOT.DS.'scripts');
        defined('CACHE')?:define('CACHE',SITE_ROOT.DS.'cache');
        defined('TEMPLATES')?:define('TEMPLATES',SITE_ROOT.DS.'templates');
    }
    private function classLoader($className){
        $class_file=CLASSES.DS.strtolower($className).'.class.php';
        if(!file_exists($class_file)){
            exit('Class ['.$className.'] could not be loaded.<br> Looked in ['.$class_file.']');
        }
        /** @noinspection PhpIncludeInspection */
        require_once $class_file;
    }

}

new Init();

?>

