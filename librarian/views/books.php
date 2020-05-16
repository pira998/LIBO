<?php
include 'header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/utility/connection.php';
if (!isset($_SESSION['librarian'])) {

    $_SESSION['msg'] = "You must log in first to view this page";
    header("location: ../sign_in.php");
}

if (isset($_GET['logout'])) {

    session_destroy();
    unset($_SESSION['librarian']);
    header("location: ../sign_in.php");
}
include $_SERVER['DOCUMENT_ROOT'] . '/classes/book.php';
$sql = "SELECT * FROM `books_details`;";
$array = mysqli_query($connection, $sql);

?>


<div class="content">
    <center>
        <button class="btn btn-primary btn-round" type="submit" name="add">
            <i class="material-icons">favorite</i> Add Book
        </button>
    </center>
    <div class="container-fluid">
        <!-- <div class="row"> -->

        <!-- <div class="row"> -->
        <div class="row active-with-click">
            <?php

            while ($obj = mysqli_fetch_array($array)) {
                $book = new Book($obj);
                

            ?>

                <!-- <div class="column" style="padding: 10px;">
                    <div class="card" style="width: 10rem; height:25rem">
                        <img class="card-img-top" src="/librarian/assets/img/<?php echo $book->getBookImg() ?>" rel="nofollow" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Book Quantity: <?php echo $book->getAvailable() ?> <br> Book availability: <?php echo $book->getQuantity() ?> <br>
                                <center><button class="btn btn-primary" type="submit">Edit</button></center>
                            </p>
                        </div>
                    </div>
                </div> -->
                <!-- <!--  -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Indigo">
                        <h2>
                            <span><?php echo $book->getTitle() ?></span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                <?php echo $book->getAuthor();?>
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-fluid"" src="/librarian/assets/img/<?php echo $book->getBookImg() ?>">
                            </div>
                            <div class="mc-description">
                                Book Quantity: <?php echo $book->getAvailable() ?><br> Book Available:<?php echo $book->getAvailable() ?><br> No of Reservation: 91<br>
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Edit
                            </h4>
                            <a href="edit_book.php?id=<?php echo $book->getId(); ?>" class="fa fa-fw fa-edit "></a>

                        </div>
                    </article>
                </div>

                <!-- <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Cyan">
                        <h2>
                            <span>Jack Nicholson</span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                The Shining
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-fluid" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-jack-nicholson.jpg">
                            </div>
                            <div class="mc-description">
                                Throughout his career, Nicholson has portrayed unique and challenging roles, many of which include dark portrayals of excitable, neurotic and psychopathic characters ...
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                            <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-linkedin"></a>
                            <a class="fa fa-fw fa-google-plus"></a>
                        </div>
                    </article>
                </div> - -->

            <?php


            }
            ?>



        </div>

    </div>
</div>
</div>


<?php
include 'footer.php';
?>