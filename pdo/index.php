<?php
require_once "./classes/Book.php";

$mybook = new Book();
// $mybook->setTitle("Ray's Book of Fun New");
// $mybook->save();
// var_dump($mybook);
// $mybookId = $mybook->getId();
// unset($mybook);

$mybookId = 1;
$bookCopy = Book::findById($mybookId);
var_dump($bookCopy);

// $bookCopy->setTitle("New Name for Ray's book of Fun");
// $bookCopy->save();
// var_dump($bookCopy);
?>