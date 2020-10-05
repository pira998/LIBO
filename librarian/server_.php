<?php
session_start();
include '../utility/connection.php';

//intializing variables

$firstname = "";
$lastname = "";
$username = "";
$email = "";
$nic = "";

$errors = array();





// Register Librarians
if (isset($_POST['submit'])) {




    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $nic = mysqli_real_escape_string($connection, $_POST['nic']);
    $password_1 = mysqli_real_escape_string($connection, $_POST['pass']);
    $password_2 = mysqli_real_escape_string($connection, $_POST['copass']);

    //form validation

    if (empty($firstname)) {
        array_push($errors, "firstname is required");
    }
    if (empty($lastname)) {
        array_push($errors, "lastname is required");
    }
    if (empty($username)) {
        array_push($errors, "username is required");
    }
    if (empty($nic)) {
        array_push($errors, "nic is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, " Password do not match");
    }

    // check database for existing user with same username

    $user_check_query = "SELECT * FROM librarian WHERE username = '$username' or email = '$email' LIMIT 1";

    $result = mysqli_query($connection, $user_check_query);
    $librarian = mysqli_fetch_assoc($result);

    if ($librarian) {
        if ($librarian['username'] === $username) {
            array_push($errors, "Username already exists");
        }
        if ($librarian['email'] === $username) {
            array_push($errors, "This email id already has a registerd username");
        }
    }

    // Register the librarian if no error

    if (count($errors) == 0) {

        $password = $password_1;
        $query = "INSERT INTO librarian (firstname,lastname,username,email,nic,password) VALUES('$firstname','$lastname','$username','$email','$nic','$password') ";

        mysqli_query($connection, $query);
        $_SESSION['username'] == $username;
        $_SESSION['success'] == "You are now logged in";
        $_SESSION["librarian"] = $_POST["username"];
        ?>
        <script type="text/javascript">
            window.location = "../librarian/views/dashboard.php"
        </script>


        <?php

    }
}
// for sign in purpose

if (isset($_POST["submit1"])) {
    $count = 0;
    $res = mysqli_query($connection, "select * from librarian where username='$_POST[username]' && password = '$_POST[pass]'");
    $count = mysqli_num_rows($res);
    if ($count == 0) {
    ?>
        <script type="text/javascript">
            window.location = "sign_in.php"
        </script>
        <div class="alert alert-danger col-lg-6 col-lg-push-3">
            <strong style="color:white">Invalid</strong> Username Or Password.
        </div>

    <?php
    } else {
        $_SESSION["librarian"] = $_POST["username"];
    ?>
        <script type="text/javascript">
            window.location = "../librarian/views/dashboard.php"
        </script>


<?php

    }
}
?>