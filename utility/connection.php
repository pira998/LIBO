<?php


class DBConnection {
    private $server = "localhost";
    private $username ="root";
    private $password = "";
    private $db = "l";

    public $conn = null;

    public function __construct(){
        try{
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
            if ($this->conn->connect_error){

                throw new Exception("Error occurred: ".$this->conn->connect_error);
                
            }
            
        }    
        catch(Exception $e){

            echo $e -> getMessage();

        }
    }
    
}
$database = new DBConnection();
$connection = $database->conn;

?>


<!-- 
//$connection=mysqli_connect("localhost","root","Shanmu@25621","database"); -->