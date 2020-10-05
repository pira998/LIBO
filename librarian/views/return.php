<?php

include $_SERVER['DOCUMENT_ROOT'] . '/utility/connection.php';


?>

<?php
$id = $_GET["id"];
$sql_for_get = "SELECT * FROM `borrowed_books` WHERE id = '$id'";
$array = mysqli_query($connection, $sql_for_get);
$m = mysqli_fetch_array($array);

$sql_for_update = "UPDATE `books_details` SET available= available+1 WHERE (`id`=$m[book_id]);";
mysqli_query($connection, $sql_for_update);

$sql = "UPDATE `borrowed_books` SET `isReturned`='Yes' WHERE (`id`=$id);";

mysqli_query($connection, $sql);



?>
<script type="text/javascript">
    window.location = ("issued_books.php")
</script>