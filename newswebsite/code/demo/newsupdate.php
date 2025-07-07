<?php
include ("functions/database.php");
$news_id = $_POST["news_id"];
$category_id = $_POST["category_id"];
$title=$_POST["title"];
$content=$_POST["content"];








$sql="update news set category_id = $category_id,title='$title',content='$content'where news_id=$news_id";
connect1();
$a=mysqli_query($connection,$sql);
$message="change successfully!";

header("Location:index2.php?message=$message");

?>