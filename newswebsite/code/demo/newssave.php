<?php 
include_once("functions/is_login.php"); 
session_start(); 
if(!is_login()){ 
     echo "Log in to get access!"; 
     return; 
}
?>
<?php
include ("functions/file_system.php");
if(empty($_POST)){ 
    $message="over the max size in php.ini";
}else{
    $user_id= $_SESSION["user_id"]; 
    $category_id=$_POST["category_id"];
    $title=$_POST["title"];
    $content=$_POST["content"];
    $current=date("Y-m-d H:i:s");
    $clicked=0;
    $file_name=$_FILES["news_file"]["name"];
    $message=upload($_FILES["news_file"],"uploads");
    $saveSQL="insert into news(news_id,user_id,category_id,title,content,publish_time,clicked,attachment) values(null,'$user_id','$category_id','$title','$content','$current','$clicked','$file_name')";
    if($message == "file uploads successfully"||"not choose"){
    include("functions/database.php");
    connect1();
    mysqli_query($connection, $saveSQL);  
    echo mysqli_error($connection);
    echo" save successfully!";
}else{
    exit($message);
}
}
$message= urlencode($message);
header("Location:index2.php?message=$message");
?>
