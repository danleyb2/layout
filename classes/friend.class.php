<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 11/13/15
 * Time: 10:15 AM
 */

class Friend {

    private  $first_name, $last_name,$sex,$age,$user_id;
    private static $database;
    function __construct( ){

    }
    public function set_user_id($id){
        $this->user_id=$id;
    }
    function init(array $properties){

        foreach ($properties as $field_name => $value){
            if(property_exists($this,$field_name)){
                $this->$field_name=$properties[$field_name];
            }
        }
    }

    function save(){
        $q="INSERT INTO friends (first_name,last_name,sex,age,user_id) VALUES ('{$this->first_name}','{$this->last_name}','{$this->sex}',{$this->age},{$this->user_id})";
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
        if(!isset(self::$database)){
           self::$database= new Database();
            return self::$database;
        }
        return self::$database;
    }
    public static function get_friends($user_id)
    {
        $q='SELECT * FROM friends WHERE user_id='.$user_id;
        $result_set=self::getDb()->query($q);
        if($result_set && mysqli_num_rows($result_set)){
            return $result_set;
        }else{
            return false;
        }
    }

}