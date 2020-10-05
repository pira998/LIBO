<?php
include 'header.php';


include $_SERVER['DOCUMENT_ROOT'] . '/classes/Mediator.php';
include $_SERVER['DOCUMENT_ROOT'] . '/classes/MediatorImp.php';
//include $_SERVER['DOCUMENT_ROOT'] . '/student/Student_Creation.php';

if (!isset($_SESSION['student'])) {

    $_SESSION['msg'] = "You must log in first to view this page";
    header("location: ../sign_in.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['student']);
    header("location: ../sign_in.php");
}


?>
<?php


$sql = "SELECT * FROM `student_info` where `username`='$_SESSION[student]'";
//$ress=mysqli_query($connection,$sql);
//$z=mysqli_fetch_array($ress);
//$student=new Student($z);

?>

<div class="content">
    <div class="container-fluid">
        <form method="post">
            <input type="submit" class="btn btn-primary btn-round" name="refresh" value="Refresh">

            </input>
        </form>




        <?php

        $query = "";
        if (isset($_POST['refresh'])) {

            $query =  $student->receiveMessage();
        }
        ?>

        <table class="table table-inbox table-hover">
            <tbody>


                <?php
                while ($message=mysqli_fetch_array($query)) {
                ?>

                    <tr class="unread">
                        <td class="inbox-small-cells">
                            <input type="checkbox" class="mail-checkbox">
                        </td>
                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                        <td class="view-message  dont-show"><?php echo $message['subject'] ?></td>
                        <td class="view-message "><?php echo $message['body'] ?></td>
                        <td class="view-message "><?php echo date('d/m/Y', $message['created_time']) ?></td>
                    </tr>
                <?php } ?>

                <br>
            </tbody>
        </table><?php


                include 'footer.php';
                ?>

        <!---->
        <!--<div class="container" style="padding-top: 100px">-->
        <!---->
        <!---->
        <!---->
        <!---->
        <!--    <div class="inbox-body">-->
        <!--        <div class="mail-option">-->
        <!--            <center>-->
        <!--                <button class="btn btn-primary btn-round" type="submit" name="add">-->
        <!--                    <i class="material-icons">favorite</i> Compose-->
        <!--                </button>-->
        <!--            </center>-->
        <!---->
        <!--            <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModal">-->
        <!--                Add student-->
        <!--            </button>-->
        <!---->
        <!--            <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModal">-->
        <!--                Add student-->
        <!--            </button>-->
        <!---->
        <!--
        <!          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
        <!--                <div class="modal-dialog" role="document">-->
        <!--                    <div class="modal-content">-->
        <!--                        <div class="modal-header">-->
        <!--                            <h5 class="modal-title" id="exampleModalLabel">Add student</h5>-->
        <!--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
        <!--                                <span aria-hidden="true">&times;</span>-->
        <!--                            </button>-->
        <!--                        </div>-->
        <!--                        <div class="modal-body">-->
        <!--                            <form class="form" method="post" action="">-->
        <!---->
        <!--                                <div class="card-body">-->
        <!---->
        <!--                                    <div class="form-group bmd-form-group">-->
        <!--                                        <div class="input-group">-->
        <!--                                            <div class="input-group-prepend">-->
        <!--                                                <div class="input-group-text"><i class="material-icons">face</i></div>-->
        <!--                                            </div>-->
        <!--                                            <input type="text" class="form-control" placeholder="First Name..." name="firstname" required>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                    <div class="form-group bmd-form-group">-->
        <!--                                        <div class="input-group">-->
        <!--                                            <div class="input-group-prepend">-->
        <!--                                                <div class="input-group-text"><i class="material-icons">face</i></div>-->
        <!--                                            </div>-->
        <!--                                            <input type="text" class="form-control" placeholder="LastName..." name="lastname" required>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                    <div class="form-group bmd-form-group">-->
        <!--                                        <div class="input-group">-->
        <!--                                            <div class="input-group-prepend">-->
        <!--                                                <div class="input-group-text"><i class="material-icons">perm_identity</i></div>-->
        <!--                                            </div>-->
        <!--                                            <input type="text" class="form-control" placeholder="UserName..." name="username" required>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                    <div class="form-group bmd-form-group">-->
        <!--                                        <div class="input-group">-->
        <!--                                            <div class="input-group-prepend">-->
        <!--                                                <div class="input-group-text"><i class="material-icons">email</i></div>-->
        <!--                                            </div>-->
        <!--                                            <input type="text" class="form-control" placeholder="Email..." name="email" required>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!---->
        <!--                                    <div class="form-group bmd-form-group">-->
        <!--                                        <div class="input-group">-->
        <!--                                            <div class="input-group-prepend">-->
        <!--                                                <div class="input-group-text"><i class="material-icons">lock_outline</i></div>-->
        <!--                                            </div>-->
        <!--                                            <input type="password" placeholder="Password..." class="form-control" name="pass" required>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!---->
        <!--                                    <div class="form-group bmd-form-group">-->
        <!--                                        <div class="input-group">-->
        <!--                                            <div class="input-group-prepend">-->
        <!--                                                <div class="input-group-text"><i class="material-icons">grade</i></div>-->
        <!--                                            </div>-->
        <!--                                            <input type="text" class="form-control" placeholder="Grade..." name="grade" required>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                    <div class="form-group bmd-form-group">-->
        <!--                                        <div class="input-group">-->
        <!--                                            <div class="input-group-prepend">-->
        <!--                                                <div class="input-group-text"><i class="material-icons">room</i></div>-->
        <!--                                            </div>-->
        <!--                                            <input type="text" class="form-control" placeholder="Address..." name="address" required>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                    <div class="form-group bmd-form-group">-->
        <!--                                        <div class="input-group">-->
        <!--                                            <div class="input-group-prepend">-->
        <!--                                                <div class="input-group-text"><i class="material-icons">pets</i></div>-->
        <!--                                            </div>-->
        <!--                                            <input type="text" class="form-control" placeholder="Nic..." name="nic" required>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                    <div class="form-group bmd-form-group">-->
        <!--                                        <div class="input-group">-->
        <!--                                            <div class="input-group-prepend">-->
        <!--                                                <div class="input-group-text"><i class="material-icons">pets</i></div>-->
        <!--                                            </div>-->
        <!--                                            <input type="text" class="form-control" placeholder="Registration Number..." name="regis_num" required>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="modal-footer">-->
        <!--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <!--                                    <input type="submit" class="btn btn-primary" name="create" value="create"></input>-->
        <!--                                </div>-->
        <!--                            </form>-->
        <!--                        </div>-->
        <!---->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!---->
        <!--            <ul class="unstyled inbox-pagination">-->
        <!--                <li><span>1-50 of 234</span></li>-->
        <!--                <li>-->
        <!--                    <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>-->
        <!--                </li>-->
        <!--                <li>-->
        <!--                    <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>-->
        <!--                </li>-->
        <!--            </ul>-->
        <!--            </>-->
        <!---->
        <!--            <table class="table table-inbox table-hover">-->
        <!--                <tbody>-->
        <!--                    <tr class="unread">-->
        <!--                        <td class="inbox-small-cells">-->
        <!--                            <input type="checkbox" class="mail-checkbox">-->
        <!--                        </td>-->
        <!--                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>-->
        <!--                        <td class="view-message  dont-show">PHPClass</td>-->
        <!--                        <td class="view-message ">Added a new class: Login Class Fast Site</td>-->
        <!--                        <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>-->
        <!--                        <td class="view-message  text-right">9:27 AM</td>-->
        <!--                    </tr>-->
        <!--                </tbody>-->
        <!--            </table>-->
        <!--        </div>-->