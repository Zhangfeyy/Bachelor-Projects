<?php
header("content-Type: text/html; charset=Utf-8");
include("functions/database.php");

$review_id = $_GET["review_id"];

$sql = "delete from review where review_id=$review_id";

connect1();

$result_set = mysqli_query($connection,$sql);

header("Location:review_list.php?url=reviewlist.php");
?>