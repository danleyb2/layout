<?php
namespace core;
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
        $_SESSION['userid']=$user['id'];
        $this->looged_in=true;
    }
    public function logout(){
        unset($_SESSION['username']);
        session_destroy();
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