<?php

$sql="SELECT * FROM `student_info` where `username`='$_SESSION[student]'";
$ress=mysqli_query($connection,$sql);
while ($mm=mysqli_fetch_array($ress)){
$student=new Student($mm);
}
?>
