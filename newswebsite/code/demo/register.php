<?php
header("content-Type: text/html; charset=Utf-8");
include("functions/database.php");

$username = $_POST["username"];
$password = md5($_POST["password"]);

$sql = "insert into users values(null,'$username','$password')";
connect1();
mysqli_query($connection,$sql);
header("Location:user_list.php");
