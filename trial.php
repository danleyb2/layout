<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 11/13/15
 * Time: 11:12 AM
 */

require_once 'classes/functions.class.php';

function createLink($page, array $params = array()) {
    $params = array_merge(array('page' => $page), $params);
    print_r($params);
    return $page.http_build_query($params);
}

//$link=createLink('home',array('name'=>'ii'));
//echo utf8_decode('brian');
class A{
    function aa(){

        $this->d['b']=new B();

    }
}
class B{
    function bb(){
        global $g;
        Functions::print_prep($this);
        Functions::print_prep($g);
    }
}
$f=new A();
$f->aa();
Functions::print_prep($f);








//$p=Functions::get_path();
//Functions::print_prep($p);
//echo '';
//$rp=explode('?', $_SERVER['REQUEST_URI']);
//Functions::print_prep(urldecode($rp[0]));


$a=[1,2,3,4,5,5,6,7];
$b=array_map(function($e){
    return $e+=21;
},$a);

//print_r($b);
?>