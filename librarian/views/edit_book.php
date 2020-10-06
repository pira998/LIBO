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
$id = $_GET['id'];
$sql = "SELECT * FROM `books_details` where id='$id';";
$array = mysqli_query($connection, $sql);
$obj = mysqli_fetch_array($array);
$bookFactory = new bookFactory();
$book = $bookFactory->createBook($obj);

?>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Book Detail</h4>
                        <p class="card-category">More information</p>
                    </div>
                    <div class="card-body">
                        <form class="form" method="post">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">id (disabled)</label>
                                        <input type="text" class="form-control" name="id" value="<?php echo $book->getId(); ?> " disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">(Title)</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo $book->getTitle(); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">(ISBN)</label>
                                        <input type="text" class="form-control" name="ISBN" value="<?php echo $book->getISBN(); ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">(Subject)</label>
                                        <input type="text" class="form-control" name="subject" value="<?php echo $book->getSubject(); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">(Publisher)</label>
                                        <input type="text" class="form-control" name="publisher" value="<?php echo $book->getPublisher(); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">(Language)</label>
                                        <input type="text" class="form-control" name="language" value="<?php echo $book->getLanguage(); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">(Price)</label>
                                        <input type="text" class="form-control" name="price" value="<?php echo $book->getPrice(); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">(Author)</label>
                                        <input type="text" class="form-control" name="author" value="<?php echo $book->getAuthor(); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">(Pages)</label>
                                        <input type="text" class="form-control" name="numOfPages" value="<?php echo $book->getNumOfPage(); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">(Purchase Date)</label>
                                        <input type="text" class="form-control" name="purchaseDate" value="<?php echo $book->getPurchaseDate(); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">(Publication Date)</label>
                                        <input type="text" class="form-control" name="publicationDate" value="<?php echo $book->getPublicationDate(); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">(Quantity)</label>
                                        <input type="text" class="form-control" name="quantity" value="<?php echo $book->getQuantity(); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">(Available)</label>
                                        <input type="text" class="form-control" name="available" value="<?php echo $book->getAvailable(); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">(who added)</label>
                                        <input type="text" class="form-control" name="librarian" value="<?php echo $book->getLibrarian(); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Book</label>
                                        <div class="form-group">
                                            <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
                                            <textarea class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary pull-right" name="Update" value="Update"></input>
                            <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="javascript:;">
                            <img class="img" src="/librarian/assets/img/<?php echo $book->getBookImg() ?>" />
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray"><?php echo $book->getTitle(); ?></h6>
                        <h4 class="card-title"><?php echo $book->getAuthor(); ?></h4>
                        <p class="card-description">
                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                        </p>

                        <input type="submit" class="btn btn-primary pull-right" name="Delete" value="Delete"></input>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


<?php
if (isset($_POST['Update'])) {

    // $book->updateBook($id, $connection, $_POST);
    $user_check_query =  "UPDATE `books_details` SET `title`='" . $_POST['title'] . "',`subject`='" . $_POST['subject'] . "',`publisher`='" . $_POST['publisher'] . "' ,`language`='" . $_POST['language'] . "',`price`='" . $_POST['price'] . "',`author`='" . $_POST['author'] . "',`numOfPages`='" . $_POST['numOfPages'] . "',`purchaseDate`='" . $_POST['purchaseDate'] . "',`publicationDate`='" . $_POST['publicationDate'] . "' ,`quantity`='" . $_POST['quantity'] . "' ,`available`='" . $_POST['available'] . "' ,`librarian`='" . $_POST['librarian'] . "' , WHERE `id`= $id ;";
    // $user_check_query = "UPDATE `books_details` SET `title` = $post[title] WHERE `id`= $id;";



    if (mysqli_query($connection, $user_check_query)) {
        echo "Records were updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $user_check_query. " . mysqli_error($connection);
    }
}
if (isset($_POST['Delete'])) {
    $book->deleteBook($id, $connection);
 
}

include 'footer.php';
?>