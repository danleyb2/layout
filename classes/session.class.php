<?php
class Session
{
    private $looged_in=false;


    function __construct(){
        session_start();
        $this->check_session();

    }
    function is_logged_in(){
        return $this->looged_in;
    }
    function login($user){
        $_SESSION['username']=$user['username'];
        $this->looged_in=true;
    }
    function logout(){
        unset($_SESSION['username']);
        $this->looged_in=false;
    }

    private function check_session(){
        if(isset($_SESSION['username'])){
            $this->looged_in=true;
        }else{
            $this->looged_in=false;
        }
    }
}
?>