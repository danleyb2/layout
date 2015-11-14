<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 11/13/15
 * Time: 10:15 AM
 */

class User {

    private  $first_name, $last_name,$username,$age,$password;
    private static $database;
    function __construct( ){

    }
    function init(array $properties){

        foreach ($properties as $field_name => $value){
            if(property_exists($this,$field_name)){
                $this->$field_name=$properties[$field_name];
            }
        }
    }

    function save(){
        $q="INSERT INTO users (first_name,last_name,username,age,password) VALUES ('{$this->first_name}','{$this->last_name}','{$this->username}',{$this->age},'{$this->password}')";
        $result_set=self::getDb()->query($q);
        if($result_set){
            return true;
        }else{
            return false;
        }

        /*foreach (get_object_vars($this) as $prop => $value) {
            $p.=$prop;
        }*/
    }
    private function getDb(){
        if(!self::$database){
           self::$database= new Database();
            return self::$database;
        }
        return self::$database;
    }
    public static function get_users()
    {
        $q='SELECT * FROM users ';
        $result_set=self::getDb()->query($q);

        if($result_set){
            return $result_set;
        }else{
            return false;
        }
    }
    static function check($username,$password){
        $q="SELECT * FROM users WHERE username='$username' AND password='$password'";

        $result_set=self::getDb()->query($q);

        if($result_set){
            return mysqli_fetch_assoc($result_set);
        }else{
            return false;
        }
    }
}