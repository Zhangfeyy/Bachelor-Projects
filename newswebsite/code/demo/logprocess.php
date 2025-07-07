<?php
@session_start();
include("functions/database.php"); 
$name = $_POST["name"];

/*echo $_POST["checknum"];
echo $_SESSION["checknum"];
if($_POST["checknum"] != $_SESSION["checknum"]){

	header("Location:index2.php?login_message=checknum_error");
	return;};
*/
if(isset($_COOKIE["password"])){ 
     $first_password = $_COOKIE["password"]; 
}else{ 
     $first_password = md5($_POST["password"]); 
} 
if(empty($_POST["expire"])){ 
     		setcookie("name",$name,time()-1); 
     		setcookie("password",$first_password,time()-1); 
} 
$password = md5($first_password); 
$sql = "select * from users where name='$name' and password ='$password'"; 
connect1();
$result_set = mysqli_query($connection,$sql); 
if(mysqli_num_rows($result_set)>0){ 
     if(isset($_POST["expire"])){ 
     		$expire = time()+intval($_POST["expire"]); 
     		setcookie("name",$name,$expire); 
     		setcookie("password",$first_password,$expire); 
     }  
     $admin = mysqli_fetch_array($result_set); 
     $_SESSION['user_id'] = $admin['user_id']; 
     $_SESSION['name'] = $admin['name']; 


     header("Location:index2.php?login_message=password_right"); 
}else{ 
     header("Location:index2.php?login_message=password_error"); 
} ?>
	

