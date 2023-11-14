<?php
include('dbcon.php');
if (isset($_POST['submit'])) {
    $book_title = $_POST['book_title'];
    $category_id = $_POST['category_id'];
    $author = $_POST['author'];
    $publisher_name = $_POST['publisher_name'];
    /* $date_receive=$_POST['date_receive']; */
    /* $date_added=$_POST['date_added']; */
    $status = $_POST['status'];

    mysqli_query($conn, "insert into book (book_title,category_id,author,publisher_name,status)
 values('$book_title','$category_id','$author','$publisher_name',NOW(),'$status')");


    header('location:books.php');
}
