<?php
include 'header.php';
if (!isset($_SESSION['student'])) {

    $_SESSION['msg'] = "You must log in first to view this page";
?>
    <script>
        window.location = "../sign_in.php";
    </script>
<?php

}

if (isset($_GET['logout'])) {

    session_destroy();
    unset($_SESSION['student']);
?>
    <script>
        window.location = "../sign_in.php";
    </script>
<?php

}

$sql_for_book = "SELECT * FROM `books_details`;";
$sql_for_student = "SELECT * FROM `student_info`;";
$array = mysqli_query($connection, $sql_for_book);
$array_for_student = mysqli_query($connection, $sql_for_student);

$total_books = 0;
$available_books = 0;
$total_students = 0;
while ($m = mysqli_fetch_array($array)) {
    $total_books = $total_books + $m['quantity'];
    $available_books = $available_books + $m['available'];
}
while ($m = mysqli_fetch_array($array_for_student)) {
    $total_students = $total_students + 1;
}

?>
<div style="margin:80px 10px">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">book</i>
                </div>
                <p class="card-category">Total Books</p>
                <h3 class="card-title"><?php echo $total_books; ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">book</i>
                </div>
                <p class="card-category">Issued Books</p>
                <h3 class="card-title"><?php echo $total_books - $available_books; ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                </div>
                <p class="card-category">Students</p>
                <h3 class="card-title"><?php echo $total_students; ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">

                </div>
            </div>
        </div>
    </div>
</div>

</div>






<?php
include 'footer.php'
?>