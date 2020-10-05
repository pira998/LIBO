<?php
include 'header.php';
// include $_SERVER['DOCUMENT_ROOT'] . '/classes/student.php';
$sql = "SELECT * FROM `requested_books` WHERE isIssued = 'No'";



$array = mysqli_query($connection, $sql);
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



<div class="content">
    <div class="container-fluid">

        <input type="submit" class="btn btn-primary btn-round" name="refresh" value="Refresh"></input>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Requested Books</h4>
                        <p class="card-category"> Info </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>User Id</th>
                                    <th>Book Name</th>
                                    <th>Requested date</th>
                                    <th>Issue</th>

                                </thead>
                                <tbody>

                                    <tr>
                                        <?php while ($m = mysqli_fetch_array($array)) :
                                    $_POST['book_id'] = $m['book_id'];
                                    $_POST['user_id'] = $m['user_id'];
                                        ?>


                                            <td><?php echo $m['user_id'] ?></td>
                                            <td><?php echo $m['book_id'] ?></td>
                                            <td><?php echo date('d/m/Y', $m['requested_time']) ?></td>


                                            <td>
                                                <form method="post">
                                                    <input type="submit" class="btn btn-success" value="Issue" name="Issue"></input>

                                                </form>
                                            </td>

                                    </tr>
                                <?php
                                            
                                    endwhile; ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <?php

            if (isset($_POST['Issue'])) {

                $sql = "UPDATE `requested_books` SET `isIssued`='Yes' WHERE (`book_id`=$_POST[book_id] AND `user_id`=$_POST[user_id]);";
                mysqli_query($connection, $sql);
                $librarian->issueBook($_POST);
            }

            include 'footer.php';
            ?>