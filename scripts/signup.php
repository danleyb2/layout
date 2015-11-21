<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 11/13/15
 * Time: 8:09 PM
 */
if(isset($_POST['username'])) {
    require_once CONFIG.DS.'config.php';
    $you = new User();
    $you->init($_POST);
    if(!$you->save()){
        echo 'Failed creating user';
    }
}

?>