<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 11/13/15
 * Time: 11:00 AM
 */

class Functions {
    private function __construct() {
    }

    /**
     * Generate link.
     * @param string $page target page
     * @param array $params page parameters
     * @return string link
     */
    public static function createLink($page, array $params = array()) {
        #$params = array_merge(array('page' => $page), $params);
        return count($params)? $page . '/?' . http_build_query($params) : $page;
    }

    /**
     * Format date.
     * @param DateTime $date date to be formatted
     * @return string formatted date
     */
    public static function formatDate(DateTime $date = null) {
        if ($date === null) {
            return '';
        }
        return $date->format('m/d/Y');
    }

    /**
     * Format date and time.
     * @param DateTime $date date to be formatted
     * @return string formatted date and time
     */
    public static function formatDateTime(DateTime $date = null) {
        if ($date === null) {
            return '';
        }
        return $date->format('m/d/Y H:i');
    }

    /**
     * Redirect to the given page.
     * @param string $page target page
     * @param array $params page parameters
     */
    public static function redirect($page, array $params = array()) {
        header('Location: ' . self::createLink($page, $params));
        die();
    }

    /**
     * Get value of the URL param.
     * @return string parameter value
     * @throws Exception if the param is not found in the URL
     */
    public static function getUrlParam($name) {
        if (!array_key_exists($name, $_GET)) {
            throw new Exception('URL parameter "' . $name . '" not found.');
        }
        return $_GET[$name];
    }

    public static function print_prep($obj){
        echo "\n".'<pre>';
        print_r($obj);
        echo "\n".'</pre>';
    }

    public static function get_path(){
        $path=array();
        if(isset($_SERVER['REQUEST_URI'])){
            $request_path=explode('?',$_SERVER['REQUEST_URI']);
            //self::print_prep($request_path);
            $path['path']=$request_path[0];
            $path['base']=rtrim(dirname($_SERVER['SCRIPT_NAME']),'\/');
            $path['call_utf8']=substr(urldecode($request_path[0]),strlen($path['base'])+1);
            $path['call']=utf8_decode($path['call_utf8']);
            if($path['call']==basename($_SERVER['PHP_SELF'])){
                $path['call']='';
            }

            $path['call_parts']=explode('/',rtrim($path['call'],'/'));
            if (isset($request_path[1])) {
                $q_path = $request_path[1];
                $path['query_utf8'] = urldecode($q_path);
                $path['query'] = utf8_decode(urldecode($q_path));
                $vars = explode('&', $path['query']);
                foreach ($vars as $var) {
                    $t = explode('=', $var);
                    $path['query_vars'][$t[0]] = $t[1];
                    // todo bug in empty query params
                    // todo bug Notice when e.g ?danleyb2@gmail.com
                }
            }

        }
        return $path;
    }
    public static function log($log){
        $file=fopen(SITE_ROOT.DS.'assets'.DS.'log.txt','a');
        if($file) {
            fwrite($file, $log."\n");
        }else{
            //could not open file
        }
        fclose($file);
    }

    /**
     * Escape the given string
     * @param string $string string to be escaped
     * @return string escaped string
     */
    public static function escape($string) {
        return htmlspecialchars($string, ENT_QUOTES);
    }

}