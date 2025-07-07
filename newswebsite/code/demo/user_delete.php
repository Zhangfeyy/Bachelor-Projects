<?php
include("functions/database.php");
include("functions/is_login.php");
if(!session_id()){
    session_start();
};
$usid = $_GET["user_id"];
echo $usid;
connect1();
$sql5="delete from users where user_id=$usid";

$a= mysqli_query($connection,$sql5);
if($a==false){	
$message = "Fault";}
else
{$message = "Nice";};


header("Location:user_list.php?url=user_list.php&message=$message");

?>
