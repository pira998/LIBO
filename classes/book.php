<?php
include $_SERVER['DOCUMENT_ROOT'] . '/classes/bookAbstract.php';


class Book extends BookAbstract
{


    public function createBook($connection, $post, $session)
    {
        $ISBN = $this->getISBN();
        $errors = array();
        $user_check_query = "SELECT * FROM books_details WHERE ISBN = '$ISBN' LIMIT 1;";

        $result = mysqli_query($connection, $user_check_query);
        $book = mysqli_fetch_assoc($result);

        if ($book) {
            if ($book['ISBN'] === $ISBN) {
                array_push($errors, "Book already exists");
            }
        }
        if (count($errors) == 0) {

            $sql = "INSERT INTO books_details VALUES ('$post[id]','$post[ISBN]','$post[title]','$post[subject]','$post[bookImg]' ,'$post[publisher]','$post[language]','$post[price]','$post[author]','$post[numOfPages]','$post[purchaseDate]','$post[publicationDate]','$post[quantity]','$post[available]','$session[librarian]');";
            $m = mysqli_query($connection, $sql);


?>

            <script type="text/javascript">
                window.location = "books.php"
            </script>
        <?php
        } else {
        ?>
            <script type="text/javascript">
                alert("Operation failed");
            </script>
        <?php

        }
    }

    public function deleteBook($id, $connection)
    {

        $sql = "DELETE FROM `books_details`  WHERE (`id`=$id);";

        mysqli_query($connection, $sql);
        ?>
        <script type="text/javascript">
            window.location = ("books.php")
        </script>
    <?php
    }
    public function updateBook($id, $connection, $post)
    {

        // $this->title = $post['title'];
        // $this->subject = $post['subject'];
        // $this->publisher = $post['publisher'];
        // $this->language = $post['language'];
        // $this->price = $post['price'];
        // $this->author = $post['author'];
        // $this->numOfPages = $post['numOfPages'];
        // $this->purchaseDate = $post['purchaseDate'];
        // $this->publicationDate = $post['publicationDate'];
        // $this->quantity = $post['quantity'];
        // $this->available = $post['available'];

         $user_check_query =  "UPDATE `books_details` SET `title`='" . $post['title'] . "',`subject`='" . $post['subject'] . "',`publisher`='" . $post['publisher'] . "' ,`language`='" . $post['language'] . "',`price`='" . $post['price'] . "',`author`='" . $post['author'] . "',`numOfPages`='" . $post['numOfPages'] . "',`purchaseDate`='" . $post['purchaseDate'] . "',`publicationDate`='" . $post['publicationDate'] . "' ,`quantity`='" . $post['quantity'] . "' ,`available`='" . $post['available'] . "' ,`librarian`='" . $post['librarian'] . "' , WHERE `id`='" . $id . "'";
        // $user_check_query = "UPDATE `books_details` SET `title` = $post[title] WHERE `id`= $id;";
        mysqli_query($connection, $user_check_query);
    ?>

        <!-- <script type="text/javascript">
            window.location = ("../views/edit_book.php?id=<?php echo $id; ?>")
        </script> -->

<?php
    }
}


?>


