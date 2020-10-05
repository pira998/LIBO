<?php
class Librarian
{


    private $id, $firstname, $lastname, $username, $address, $email, $nic, $status;
    public function __construct($details)
    {

        $details[] = $details;
        $this->id = $details['id'];

        $this->firstname = $details['firstname'];
        $this->lastname = $details['lastname'];
        $this->username = $details['username'];
        $this->email = $details['email'];

        $this->nic = $details['nic'];
        $this->address = $details['address'];
    }
    public function getId()
    {
        return $this->id;
    }


    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getUsername()
    {
        return $this->username;
    }


    public function getAddress()
    {
        return $this->address;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getNic()
    {
        return $this->nic;
    }
    public function updateLibrarian($post, $connection, $id)
    {

        $this->firstname = $post['firstname'];
        $this->lastname = $post['lastname'];
        $this->email = $post['email'];
        $this->address = $post['address'];
        $this->nic = $post['nic'];



        $user_check_query =  "UPDATE `librarian` SET `firstname`='" .  $post['firstname'] . "',`lastname`='" . $post['lastname'] . "',`address`='" . $post['address'] . "',`email`='" . $post['email'] . "' ,`nic`='" . $post['nic'] . "' WHERE `id`='" . $id . "'";

        mysqli_query($connection, $user_check_query);
?>

        <script type="text/javascript">
            window.location = ("../views/user_profile.php?id=<?php echo $id; ?>")
        </script>

    <?php
    }
    public function issueBook($post)
    {

        $created_time = time();
        $due_time =$created_time+ (7 * 24 * 60 * 60);
        $sql = "INSERT INTO `borrowed_books` VALUES('','$post[book_id]','$post[user_id]','$created_time','$due_time','No')";
        $sql_for_update ="UPDATE `books_details` SET available= available-1 WHERE (`id`=$post[book_id]);";
        
        $connection = Connector::getConnection();
        mysqli_query($connection, $sql);
        mysqli_query($connection, $sql_for_update);
        echo "alert('Successfully issued')";
    ?>
        <script type="text/javascript">
            window.location = "issued_books.php"
        </script>
<?php
    }
}






?>