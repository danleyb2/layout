<?php
class Ajax{

    private $db;
    function __construct(){
        require_once CONFIG.DS.'config.php';
        $this->db=new Database();
    }
    function upvote_friend($id){
        $q='update friends set points=points+1 where id='.$id;
        $rs=$this->db->query($q);
        if($rs){
            return true;
        }
        return false;
    }
    function downvote_friend($id){
        $q='update friends set points=points-1 where id='.$id;
        $rs=$this->db->query($q);
        if($rs){
            return true;
        }
        return false;
    }
    function delete_friend($id){
        $q='DELETE FROM friends WHERE id='.$id.' LIMIT 1';
        $rs=$this->db->query($q);
        if($rs){
            return true;
        }
        return false;
    }


}


?>