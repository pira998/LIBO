<?php
include("server_.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/css/util.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">

            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                <form class="login100-form validate-form" method="POST" action="sign_up.php">
                    <span class="login100-form-title p-b-33">
                        Register a Student account
                    </span>
                    <div class="validate-input" data-validate="Register Number is required">
                        <input class="form-control" type="text" name="regis_num" placeholder="Register Number">

                    </div>

                    <div class="validate-input" data-validate="Firstname is required">
                        <input class="form-control" type="text" name="firstname" placeholder="FirstName">

                    </div>
                    <div class="validate-input" data-validate="Lastname is required">
                        <input class="form-control" type="text" name="lastname" placeholder="LastName">

                    </div>
                    <div class="validate-input" data-validate="Username is required">
                        <input class="form-control" type="text" name="username" placeholder="UserName">

                    </div>
                    <div class="validate-input" data-validate="Grade is required">
                        <input class="form-control" type="text" name="grade" placeholder="Grade">

                    </div>
                    <div class="validate-input" data-validate="Address is required">
                        <input class="form-control" type="text" name="address" placeholder="Address">

                    </div>
                    <div class="validate-input" data-validate="NIC is required">
                        <input class="form-control" type="text" name="nic" placeholder="NIC number">

                    </div>


                    <div class="validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="form-control" type="text" name="email" placeholder="Email">

                    </div>

                    <div class="rs1 validate-input" data-validate="Password is required">
                        <input class="form-control" type="password" name="pass" placeholder="Password">

                    </div>
                    <div class="rs1 validate-input" data-validate="Confirm Password is required">
                        <input class="form-control" type="password" name="copass" placeholder="Confirm Password">

                    </div>


                    <div class="container-login100-form-btn m-t-20">
                        <input class="login100-form-btn" type="submit" name="submit" value="Register">


                    </div>

                    <div class="text-center">
                        <span class="txt1">
                            Already user?
                        </span>

                        <a href="sign_in.php" class="txt2 hov1">
                            Sign in
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/vendor/bootstrap/js/popper.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/vendor/daterangepicker/moment.min.js"></script>
    <script src="/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="/js/main.js"></script>

    <script src="/js/particles.js"></script>
    <script src="/js/app.js"></script>

</body>

</html>