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
$sql = "SELECT * FROM `books_details`;";
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
                                        <th>Title</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Request</th>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <?php while ($m = mysqli_fetch_array($array)) :
                                            $book = new Book($m);
                                            ?>

                                            <?php $bookTitle=$book->getTitle();?>
                                            <td><?php echo $book->getTitle(); ?></td>
                                            <td><?php echo $book->getSubject(); ?></td>
                                            <td><button class="btn btn-info"><?php echo $book->getState();?></button>
                                            </td>

                                            <td><a href="request.php?id=<?php echo $book->getId(); ?>"><button class="btn btn-danger">Request</button></a>
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