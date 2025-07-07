<?php

include("functions/database.php");
include("functions/is_login.php");
if(!session_id()){
	session_start();
}
$category_id = $_GET["category_id"];
connect1();
$sql3="delete from review where news_id in (select news_id from news where category_id=$category_id)";
mysqli_query($connection,$sql3);
$sql4="delete from news where category_id=$category_id";
mysqli_query($connection,$sql4);
$sql5="delete from category where category_id=$category_id";
mysqli_query($connection,$sql5);


$message = "Delete successfully！";

header("Location:cat_list.php?url=cat_list.php&message=$message");

?>