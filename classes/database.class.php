<?php
final class Database{
    private $connection;
    private $PDO;
    public function __construct(){
        $this->open_connection();
    }
    private function open_connection(){
        $this->connection=mysqli_connect(DBHOST,DBUSER,DBPASSWORD,DB);
        if(!$this->connection){
            exit('db connection failed');
        }
        /*try{
            $this->PDO=new PDO("mysql:host=localhost;dbname=test;charset=utf8",'root','Biologys');
        }catch (Exception $e){
            exit($e->getMessage());
        }*/
    }
    public function get_connection(){
        return $this->connection;
    }
    public function __destruct(){
        $this->close_connection();
    }

    private function close_connection(){
        if(isset($this->connection)){
            mysqli_close($this->connection);
        }
    }
    public function query($sql)
    {
        $result = mysqli_query($this->connection,$sql);
        if (!$result) {
            $output = "Database query failed: " . mysqli_error($this->connection) . "<br/><br/>";
            $output .= "Last query: " . $sql;
            Functions::print_prep($this);
            exit($output);
        }
        return $result;

    }
    private function queryPDO($sql) {
        $statement = $this->get_connection()->query($sql, PDO::FETCH_ASSOC);
        if ($statement === false) {
            exit($this->get_connection()->errorInfo());
        }
        return $statement;
    }
    function execute($sql){
        $qry=$this->get_connection()->prepare($sql);
        $qry->execute(array());
    }
}

?>