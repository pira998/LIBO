


<!--
//$connection=mysqli_connect("localhost","root","Shanmu@25621","database"); -->
<?php
class Connector{
    private static $server = "localhost";
    private static $username ="root";
    private static $password = "";
    private static $db = "l";

    private static $connection=null;

    private function __construct(){

    }

    public static function getConnection(){
        if (self::$connection ==null){
            self::$connection=mysqli_connect(self::$server,self::$username,self::$password,self::$db);
        }
        return self::$connection;
    }
}

$connection=Connector::getConnection();


?>