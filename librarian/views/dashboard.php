<?php
include 'header.php';
if (!isset($_SESSION['librarian'])) {

    $_SESSION['msg'] = "You must log in first to view this page";
?>
    <script>
        window.location = "../sign_in.php";
    </script>
<?php

}

if (isset($_GET['logout'])) {

    session_destroy();
    unset($_SESSION['librarian']);
?>
    <script>
        window.location = "../sign_in.php";
    </script>
<?php

}


?>






<?php
include 'footer.php'
?>