<?php
include 'header.php'; ?>


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
            $x = 10;
            while ($x--) {
            ?>

                <div class="column" style="padding: 10px;">
                    <div class="card" style="width: 10rem;">
                        <img class="card-img-top" src="/librarian/assets/img/book_images/53d345282593dc27d03a8222d41fa144s-l1600.jpg" rel="nofollow" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Book Quantity: 10 <br> Book availability: 5 <br>
                                <center><button class="btn btn-primary" type="submit">Edit</button></center>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- 
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Red">
                        <h2>
                            <span>Computer kiramam</span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                Sujatha
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-fluid" src="/librarian/assets/img/book_images/53d345282593dc27d03a8222d41fa144s-l1600.jpg">
                            </div>
                            <div class="mc-description">
                                Book Quantity: 100<br> Book Available: 90<br> No of Reservation: 91<br>
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                            <a href="edit_book.php?id=1" class="fa fa-fw fa-edit "></a>
                            
                        </div>
                    </article>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
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
                </div> -->

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