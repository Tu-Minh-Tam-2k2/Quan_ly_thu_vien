<?php
include('dbcon.php');
$id=$_GET['id'];
mysqli_query($conn,"update book set status = 'Archive' where book_id='$id'")or die(mysqli_error($conn));
header('location:books.php');
?>