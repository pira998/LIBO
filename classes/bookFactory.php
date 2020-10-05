<?php
include $_SERVER['DOCUMENT_ROOT'] . '/classes/factory.php';
include $_SERVER['DOCUMENT_ROOT'] . '/classes/book.php';

    class bookFactory implements Factory{

        public function createBook($bookDetails){

            return new Book($bookDetails);

        }


    }

?>