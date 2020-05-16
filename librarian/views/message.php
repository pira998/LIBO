<?php
include 'header.php';
if (!isset($_SESSION['librarian'])) {

    $_SESSION['msg'] = "You must log in first to view this page";
    header("location: ../sign_in.php");
}

if (isset($_GET['logout'])) {

    session_destroy();
    unset($_SESSION['librarian']);
    header("location: ../sign_in.php");
}


?>

<div class="container" style="padding-top: 100px">




    <div class="inbox-body">
        <div class="mail-option">
            <center>
                <button class="btn btn-primary btn-round" type="submit" name="add">
                    <i class="material-icons">favorite</i> Compose
                </button>
            </center>


            <ul class="unstyled inbox-pagination">
                <li><span>1-50 of 234</span></li>
                <li>
                    <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                </li>
                <li>
                    <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                </li>
            </ul>
            </>

            <table class="table table-inbox table-hover">
                <tbody>
                    <tr class="unread">
                        <td class="inbox-small-cells">
                            <input type="checkbox" class="mail-checkbox">
                        </td>
                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                        <td class="view-message  dont-show">PHPClass</td>
                        <td class="view-message ">Added a new class: Login Class Fast Site</td>
                        <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                        <td class="view-message  text-right">9:27 AM</td>
                    </tr>
                </tbody>
            </table>
        </div>