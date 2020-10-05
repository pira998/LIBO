<?php 

abstract class BookAbstract {

  private $id, $ISBN, $title, $subject, $bookImg, $publisher, $language, $price, $author, $numOfPages, $purchaseDate, $publicationDate, $quantity, $available, $librarian;


  public function __construct($post)
    {
        $this->id = $post['id'];
        $this->ISBN = $post['ISBN'];
        $this->title = $post['title'];
        $this->subject = $post['subject'];
        $this->bookImg = $post['bookImg'];
        $this->publisher = $post['publisher'];
        $this->language = $post['language'];
        $this->price = $post['price'];
        $this->author = $post['author'];
        $this->numOfPages = $post['numOfPages'];
        $this->purchaseDate = $post['purchaseDate'];
        $this->publicationDate = $post['publicationDate'];
        $this->quantity = $post['quantity'];
        $this->available = $post['available'];
        $this->librarian = $post['librarian'];
    }
    public function getId()
    {
        return $this->id;
    }
    public function getISBN()
    {
        return $this->ISBN;
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function getSubject()
    {
        return $this->subject;
    }
    public function getBookImg()
    {
        return $this->bookImg;
    }
    public function getPublisher()
    {
        return $this->publisher;
    }
    public function getLanguage()
    {
        return $this->language;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getNumOfPage()
    {
        return $this->numOfPages;
    }
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getAvailable()
    {
        return $this->available;
    }
    public function getLibrarian()
    {
        return $this->librarian;
    }
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }
    public function getState()
    {
        if ($this->quantity <= 0) {
            $this->state = "NO";
        } else {
            $this->state = "YES";
        }
        return $this->state;
    }
    public function createBook($connection, $post, $session)
    {
          
    }

    public function deleteBook($id, $connection)
    {

    }
    public function updateBook($id, $connection, $post)
    {

    }
}


?>