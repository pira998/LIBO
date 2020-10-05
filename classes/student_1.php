<?php


class Student
{


    private $register_no, $firstname, $lastname, $username, $grade, $address, $email, $nic, $status;
    private $id, $password ;
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
    public function updateStudent($id, $regis_num, $firstname, $lastname, $username, $grade, $address, $email, $nic)
    {
        $this->register_no = $regis_num;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->email = $email;
        $this->grade = $grade;
        $this->address = $address;
        $this->nic = $nic;


        return "UPDATE `student_info` SET `regis_num`='" . $regis_num . "',`firstname`='" . $firstname . "',`lastname`='" . $lastname . "',`username`='" . $username . "' ,`grade`='" . $grade . "' ,`Address`='" . $address . "',`email`='" . $email . "' ,`nic`='" . $nic . "' WHERE `id`='" . $id . "'";
    }

    public function createStudent($connection,$post)
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

          $sql = "INSERT INTO student_info VALUES('','$post[regis_num]','$post[firstname]','$post[lastname]','$post[username]','$post[grade]','$post[address]','$post[email]','$post[nic]','$post[password]','Yes');";
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
}

?>