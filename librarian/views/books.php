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

include $_SERVER['DOCUMENT_ROOT'] . '/classes/bookFactory.php';

$sql = "SELECT * FROM `books_details`;";
$array = mysqli_query($connection, $sql);

?>


<div class="content">
    <center>
        <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModal">
            Add Book
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="post" action="" enctype="multipart/form-data">

                            <div class="card-body">
                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">face</i></div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Book Id" name="id" required="">
                                    </div>
                                </div>
                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">face</i></div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="ISBN" name="ISBN" required="">
                                    </div>
                                </div>
                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">face</i></div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Title..." name="title" required>
                                    </div>
                                </div>

                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">perm_identity</i></div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Subject..." name="subject" required>
                                    </div>
                                </div>

                                <!-- <div class="form-group form-file-upload form-file-multiple">
                                    <div class="input-group">
                                        <button type="file" class="btn btn-fab btn-round btn-primary">
                                            <i class="material-icons">attach_file</i>
                                        </button>
                                        <input type="text" class="form-control inputFileVisible" placeholder="Single File">
                                        <span class="input-group-btn">

                                        </span>
                                    </div>
                                </div> -->
                                <input type="file" name="bb" id="bb">
                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">email</i></div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Email..." name="email" required>
                                    </div>


                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                                            </div>
                                            <input type="text" placeholder="Publisher..." class="form-control" name="publisher" required>
                                        </div>
                                    </div>

                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">grade</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Languages..." name="language" required>
                                        </div>
                                    </div>

                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">room</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Price..." name="price" required>
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">pets</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Author..." name="author" required>
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">pets</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Pages..." name="numOfPages" required>
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">pets</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="PurchaseDate..." name="purchaseDate" required>
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">pets</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="PublicationDate..." name="publicationDate" required>
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">pets</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Quantity..." name="quantity" required>
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">pets</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Available..." name="available" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" name="create" value="create"></input>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </center>



    <?php

    if (isset($_POST["create"])) {
        $tm = md5(time());
        $fnm = $_FILES['bb']['name'];
        $dst = __DIR__ . "/../../librarian/assets/img/book_images/" . $tm . $fnm;
        $dst1 = "book_images/" . $tm . $fnm;

        move_uploaded_file($_FILES['bb']['tmp_name'], $dst);

        $_POST['bookImg'] = $dst1;
        $bookItem = new Book($_POST);
        $bookItem->createBook($connection, $_POST, $_SESSION);
    }

    ?>









    <div class="container-fluid">
        <!-- <div class="row"> -->

        <!-- <div class="row"> -->
        <div class="row active-with-click">
            <?php

            while ($obj = mysqli_fetch_array($array)) {
                $bookFactory = new bookFactory();
                $book = $bookFactory->createBook($obj);


            ?>

                <!-- <div class="column" style="padding: 10px;">
                    <div class="card" style="width: 10rem; height:25rem">
                        <img class="card-img-top" src="/librarian/assets/img/<?php echo $book->getBookImg() ?>" rel="nofollow" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Book Quantity: <?php echo $book->getAvailable() ?> <br> Book availability: <?php echo $book->getQuantity() ?> <br>
                                <a href="edit_book.php?id=<?php echo $book->getId(); ?>" ><button class="btn btn-primary" type="submit">Edit</button></a>
                                
                            </p>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Indigo">
                        <h2>
                            <span><?php echo $book->getTitle() ?></span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                <?php echo $book->getAuthor(); ?>
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-fluid"" src="/librarian/assets/img/<?php echo $book->getBookImg() ?>"> </div> <div class="mc-description">
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