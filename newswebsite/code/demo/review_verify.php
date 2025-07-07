<?php
header('Content-type:text/html;charset=utf-8');
include("functions/database.php");

$review_id = $_GET["review_id"];

$sql = "update review set state = 'checked' where review_id=$review_id";
connect1();
mysqli_query($connection,$sql);
$message="Verify successfully!";
header("Location:review_list.php?message=$message");

?>