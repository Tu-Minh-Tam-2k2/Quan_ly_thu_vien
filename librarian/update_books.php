<?php
include('dbcon.php');
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $book_title = $_POST['book_title'];
    $category_id = $_POST['category_id'];
    $author = $_POST['author'];
    $publisher_name = $_POST['publisher_name'];
    $status = $_POST['status'];




    mysqli_query($conn, "update book set book_title='$book_title',category_id='$category_id',author='$author'
,publisher_name = '$publisher_name',status='$status' where book_id='$id'") or die(mysqli_error  ($conn));


    header('location:books.php');
}
