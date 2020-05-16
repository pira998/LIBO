<?php

include $_SERVER['DOCUMENT_ROOT'] . '/utility/connection.php';


?>

<?php
$id = $_GET["id"];
$sql = "UPDATE `student_info` SET `status`='No' WHERE (`id`=$id);";

mysqli_query($connection, $sql);



?>
<script type="text/javascript">
window.location = ("students.php")
</script>