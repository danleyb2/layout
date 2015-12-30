<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 12/11/15
 * Time: 9:47 PM
 */

class Router {
    public $routes_array;
    public $routes_regex;

    function __construct($routes_array){
        $this->routes_array=$routes_array;
    }
    function route($path,$controller){
        if(array_key_exists($controller,$this->routes_array)){
            //this is a second route
        }else{
            $this->routes_array[$controller]=array();
            //create a routes array
        }
        array_push($this->routes_array[$controller],$path);

    }
    /*
     * getting a controller for the path
     */
    function run(){


        $this->routes_regex=array_map(function($r){
            return preg_replace(
                array(
                    #"/\/:id/",
                    #"/(?!.*id)\/:([\w]+)$/",
                    "/\/:([\w]+)\//",
                    "/\/:([\w]+)$/",
                    "/\//"
                ),
                array(
                    #'/([0-9]+)/',
                    '/([\w]+)/',
                    '/([\w]+)',
                    '\/'
                ),$r);
        },$this->routes_array);

        #Functions::print_prep($this->routes_array);exit;
        $path=Functions::get_path();

        #$p=trim($_SERVER['REQUEST_URI']);
        #echo 'PATH : '.$p;  echo "<br>\n\n";
        $p=trim($path['path']);
        #echo 'PATH : '.$p;  echo "<br>\n\n";
        #Functions::print_prep($this->routes_array);
        #Functions::print_prep($this->routes_regex);

        foreach ($this->routes_regex as $controller =>$routes ) {
            #Functions::print_prep($routes);
            foreach ($routes as $k=> $route) {

                $rg = "/^[\/]{0,1}$route(\/{0,1})$/";
                #echo "______________________    ##$route##   _____________________<br>\n";
                #echo $rg;echo "<br>\n";

                $pt = array();
                if (preg_match("$rg", $p, $pt)) {
                    #echo "<br>\nMATCH RESULT";Functions::print_prep($pt);

                    #echo "<br>\nREGEX WAS: ";Functions::print_prep($rg);
                    #echo "<br>\nSTRING WAS: ";Functions::print_prep($p);

                    $request = array();//Todo turn into an Object
                    #Functions::print_prep($this->routes_array[$controller][key($routes)]);
                    $f = array();
                    $c = preg_match_all("/\/:[\w]+/", $this->routes_array[$controller][key($routes)], $f);//todo TEST
                    if ($c) {
                        //Functions::print_prep($f[0]);
                        //Functions::print_prep($pt);
                        foreach ($f[0] as $i => $param_name) {
                            $request[ltrim($param_name, '/:')] = $pt[$i + 1];
                        }

                    }

                    //Functions::print_prep($pt);
                    //echo "\t\t Controller is [:] ".$controller;
                    #Functions::print_prep($request);
                    /** @noinspection PhpIncludeInspection */
                    //exit();
                    //require_once CONTROLLERS . DS .'test.php';
                    $controller_file=CONTROLLERS . DS . $controller . '.php';
                    if(file_exists($controller_file)){
                        /** @noinspection PhpIncludeInspection */
                        include_once $controller_file;
                    }else{
                        throw new Exception('Controller file ['.$controller_file.'] does not exist.');
                    }
                    exit();
                }
                //echo "<br>\n";
            }
        }
        //todo no controller page
        dispNoController($p);

    }
}