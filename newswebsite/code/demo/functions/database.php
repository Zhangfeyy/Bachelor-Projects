<?php
function connect1(){
    $connection = null;
    global $connection;
    $connection = @mysqli_connect("localhost:3308","root","","news") or die (mysqli_error($connection));
    @mysqli_select_db($connection, "news") or die (mysqli_error($connection)); 
    if($connection){
   
   }else{
      print("error 1 ");
   }
   echo"</br>";
}
function close1(){
global $connection;
    if($connection)
mysqli_close($connection) or die (mysqli_error($connection));}
?>