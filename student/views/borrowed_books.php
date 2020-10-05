<?php
include ('header.php');
if (!isset($_SESSION['student'])) {

    $_SESSION['msg'] = "You must log in first to view this page";
    header("location: ../sign_in.php");
}

if (isset($_GET['logout'])) {

    session_destroy();
    unset($_SESSION['student']);
    header("location: ../sign_in.php");
}
include $_SERVER['DOCUMENT_ROOT'] . '/classes/book.php';
$id=$student->getId();

$sql = "SELECT * FROM `borrowed_books` WHERE `user_id`='$id' ORDER BY `borrowed_date` DESC ;";
$array = mysqli_query($connection, $sql);

?>


    <div class="content">
        <div class="container-fluid">
            <center>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Search Book" id="Search_Book" name="Search_Book" onkeyup="myFunction(0,'Search_Book')">
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Book </h4>
                                <p class="card-category"> Info </p>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="myTable">
                                        <thead class=" text-primary">
                                        <th>Book_name</th>
                                        <th>Borrowed_date</th>
                                        <th>Due_date</th>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <?php while ($m = mysqli_fetch_array($array)) :
                                            $sql_for_get = "SELECT * FROM `books_details` WHERE id = '$m[book_id]'";
                                            $array = mysqli_query($connection, $sql_for_get);
                                            $sql_for_book = mysqli_fetch_array($array);

                                            ?>

                                            <td><?php echo  $sql_for_book['title'] ?></td>
                                            <td><?php echo date('d/m/Y', $m[3]) ?></td>
                                            <td><?php echo date('d/m/Y', $m[4]) ?></td>

                                            </td>

                                        </tr>
                                        <?php endwhile; ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </center>
        </div>
    </div>
    <script>
        function myFunction(number,myInput) {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById(myInput);
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[number];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>



<?php
include ('footer.php');
?>