<?php
include 'header.php';
// include $_SERVER['DOCUMENT_ROOT'] . '/classes/student.php';
$sql = "SELECT * FROM `borrowed_books` WHERE isReturned = 'No'";
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
        <center>
            <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModal">
                Issue a Book
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Issue Book</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" method="post" action="">

                                <div class="card-body">

                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">face</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="UserId..." name="user_id" required>
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">face</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="BookId..." name="book_id" required>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">face</i></div>
                                            </div>
                                            <select class="form-control" name="book_id">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div> -->
                                    </div>






                                    <!-- <div class="form-group">
                                        <label for="exampleFormControlSelect1">Example select</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div> -->

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" name="Issue" value="Issue"></input>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </center>




        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Issued Books </h4>
                        <p class="card-category"> Info </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>User Id</th>
                                    <th>Book Id</th>
                                    <th>Issued Date</th>
                                    <th>Due Date</th>
                                    <th>Return</th>

                                </thead>
                                <tbody>

                                    <tr>
                                        <?php while ($m = mysqli_fetch_array($array)) :

                                        ?>


                                            <td><?php echo $m['user_id'] ?></td>
                                            <td><?php echo $m['book_id'] ?></td>
                                            <td><?php echo date('d/m/Y', $m['borrowed_date']) ?></td>
                                            <td><?php echo date('d/m/Y', $m['due_date'])  ?></td>


                                            <td><a href="return.php?id=<?php echo $m['id']; ?>"><button class="btn btn-danger">Return</button></a>
                                            </td>

                                    </tr>
                                <?php endwhile; ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <?php
            if (isset($_POST['Issue'])) {


                $librarian->issueBook($_POST);
            }


            include 'footer.php';
            ?>