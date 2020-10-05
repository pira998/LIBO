<?php

class Student
{

    //    private static $students = array();
    private $register_no, $firstname, $lastname, $username, $grade, $address, $email, $nic, $status;
    private $id, $password;
    private $messageBox = array();


    public function __construct($details)
    {

        $this->id = $details['id'];
        $this->register_no = $details['regis_num'];
        $this->firstname = $details['firstname'];
        $this->lastname = $details['lastname'];
        $this->username = $details['username'];
        $this->email = $details['email'];
        $this->grade = $details['grade'];
        $this->address = $details['address'];
        $this->nic = $details['nic'];
        $this->status = $details['status'];
        if (isset($details['pass'])) {
            $this->password = $details['pass'];
        }
    }
    public function getId()
    {
        return $this->id;
    }

    public function getRegisterNo()
    {
        return $this->register_no;
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

    public function getGrade()
    {
        return $this->grade;
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
    public function getStatus()
    {
        return $this->status;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function receiveMessage()
    {
        $sql = "SELECT * FROM `messages`ORDER BY `created_time` DESC";
        $connection = Connector::getConnection();
        $query = mysqli_query($connection, $sql);
        return $query;
    }
    public function getInstance()
    {
        return self::class;
    }
    public function updateStudent($post, $connection, $id)
    {
        $this->firstname = $post['firstname'];
        $this->lastname = $post['lastname'];
        $this->email = $post['email'];
        $this->address = $post['address'];


        $user_check_query =  "UPDATE `student_info` SET `firstname`='" .  $post['firstname'] . "',`lastname`='" . $post['lastname'] . "',`address`='" . $post['address'] . "',`email`='" . $post['email'] . "'  WHERE `id`='" . $id . "'";

        mysqli_query($connection, $user_check_query);
?> <script type="text/javascript">
            window.location = ("../views/user_profile.php?id=<?php echo $id; ?>")
        </script><?php
                }
                //    public function getInstance($StudentArray){
                //        while ($m = mysqli_fetch_array($StudentArray)) {
                //            if(!array_key_exists($m["id"], self::$instances)) {
                //                self::$instances[$m["id"]] = new self($m);
                //            }
                //
                //            return self::$instances[$m["id"]];
                //
                //        }
                //    }
                public function createStudent($connection, $post)
                {
                    $errors = array();
                    $user_check_query = "SELECT * FROM student_info WHERE username = '$this->username' or email = '$this->email' LIMIT 1";

                    $result = mysqli_query($connection, $user_check_query);
                    $student = mysqli_fetch_assoc($result);

                    if ($student) {
                        if ($student['username'] === $this->username) {
                            array_push($errors, "Username already exists");
                        }
                        if ($student['email'] === $this->username) {
                            array_push($errors, "This email id already has a registerd username");
                        }
                    }
                    if (count($errors) == 0) {

                        $sql = "INSERT INTO student_info VALUES('','$post[regis_num]','$post[firstname]','$post[lastname]','$post[username]','$post[grade]','$post[address]','$post[email]','$post[nic]','$post[password]','No');";
                        $m = mysqli_query($connection, $sql);


                    ?>

            <script type="text/javascript">
                window.location = "students.php"
            </script>
        <?php
                    } else {
        ?>
            <script type="text/javascript">
                alert("Operation failed");
            </script>
        <?php

                    }
                }

                public function request_book($book_id)
                {
                    $user_name = $_SESSION['student'];
                    $time = time();
                    $connection = Connector::getConnection();
                    $sql_for_student_id = "SELECT * FROM `student_info` where username='$user_name';";
                    $array = mysqli_query($connection, $sql_for_student_id);
                    $student = mysqli_fetch_array($array);
                    $student_id = $student['id'];


                    $sql = "INSERT INTO `requested_books` VALUES('','$book_id','$student_id','$time','No')";
                    if (mysqli_query($connection, $sql)) {
        ?>
            <script type="text/javascript">
                window.location = "../views/requested_books.php";
            </script>

        <?php
                    }
                }

                public function requested_list($id)
                {
                    $connection = Connector::getConnection();
                    $sql = "DELETE FROM `requested_books` WHERE id='$id'";

                    mysqli_query($connection, $sql);
        ?>
        <script type="text/javascript">
            window.location = "../views/requested_books.php";
        </script>

<?php

                }
            }

?>