<?php
include ("functions/database.php");
$news_id = $_GET["news_id"];
echo $news_id;
$deletersql1="delete from review where news_id=$news_id";
$deletersql2="delete from news where news_id=$news_id";
connect1();
mysqli_query($connection,$deletersql1);
mysqli_query($connection,$deletersql2);
$message="delete successfully!";
header("Location:index2.php?message=$message");
?>
