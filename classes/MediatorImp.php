<?php



class MediatorImp extends Mediator
{
    private $userList, $body, $subject, $created_time;


    public function __construct()
    {
        $userList = array();
    }

    public function sendMessage($post, $connection)
    {
        //        foreach ($this->userList as $user){
        //            $user->receiveMessage($post);
        //        }
        $created_time = time();
        $sql = "INSERT INTO `messages` VALUES('','$post[subject]','$post[body]','$created_time')";
        $connection = Connector::getConnection();
        mysqli_query($connection, $sql);
        echo "<script>alert('Successfully message sent'); </script>";
?>
        <script type="text/javascript">
            window.location = "message.php"
        </script>
<?php

    }

    public function addUser($user)
    {
        // TODO: Implement addUser() method.
    }
}




?>