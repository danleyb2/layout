<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 11/13/15
 * Time: 4:52 PM
 */
if(isset($_GET['username'])){
    require_once CONFIG.DS.'config.php';
    $tru=User::check($_GET['username'],$_GET['password']);
    if($tru){
        //Functions::print_prep($tru);
        $session->login($tru);
        $_SESSION['message']= 'Logged in successfully';
    }else{
        $_SESSION['message']= 'Wrong username password combination';
    }
}

?>