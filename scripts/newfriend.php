<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 11/13/15
 * Time: 8:09 PM
 */
if(isset($_POST['first_name'])) {
    require_once CONFIG.DS.'config.php';
    $fr = new Friend();

    $fr->init($_POST);
    $fr->set_user_id($_SESSION['userid']);
    if(!$fr->save()){
        echo 'Failed adding Friend';
    }

}

?>