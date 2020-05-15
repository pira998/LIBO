<?php 
class Librarian{


private $id, $register_no, $firstname, $lastname, $username, $grade, $address, $email, $nic, $status;
public function __construct($details)
{

$details[]=$details;
$this->id = $details['id'];
$this->register_no = $details['regis_num'];
$this->firstname = $details['firstname'];
$this->lastname = $details['lastname'];
$this->username = $details['username'];
$this->email = $details['email'];
$this->grade = $details['grade'];
$this->address = $details['Address'];
$this->nic = $details['nic'];
$this->status = $details['status'];
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
public function updateStudent($id,$regis_num, $firstname, $lastname, $username, $grade, $address, $email, $nic){
$this->register_no = $regis_num;
$this->firstname = $firstname;
$this->lastname = $lastname;
$this->username = $username;
$this->email =$email;
$this->grade = $grade;
$this->address = $address;
$this->nic = $nic;


return "UPDATE `student_info` SET `regis_num`='" . $regis_num . "',`firstname`='" . $firstname . "',`lastname`='" . $lastname . "',`username`='" . $username . "' ,`grade`='" . $grade . "' ,`Address`='" . $address . "',`email`='" . $email . "' ,`nic`='" . $nic . "' WHERE `id`='" . $id . "'";

}

}

?>