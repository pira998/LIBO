<?php
include $_SERVER['DOCUMENT_ROOT'].'/utility/connection.php';

$id=$_GET['id'];

$sql="DELETE FROM `student_info`  WHERE (`id`=$id);";
mysqli_query($connection,$sql);


?>

<script type="text/javascript">
window.location = ("students.php")
</script>