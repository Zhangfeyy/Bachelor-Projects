<?php
header('Content-type:text/html;charset=utf-8');
include("functions/database.php");

$news_id = $_POST["news_id"];

$content = $_POST["content"];

$currentDate = date("Y-m-d H:i:s");

$ip = $_SERVER["REMOTE_ADDR"];

$state = "unchecked";

$sql = "insert into review values(null, $news_id, '$content', '$currentDate', '$state', '$ip')";

connect1();

mysqli_query($connection,$sql);


$message = "Review successfully";

header("Location:index2.php?url=index2.php&message=$message");

?>