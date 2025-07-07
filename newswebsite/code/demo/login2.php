<?php
@session_start();
include("functions/is_login.php"); 

if(isset($_GET["login_message"])){ 
     if($_GET["login_message"]=="checknum_error"){ 
     		echo "Checknum is wrong,try again!<br/>"; 
     }else if($_GET["login_message"]=="password_error"){ 
     		echo "Password is wrong,try again!<br/>"; 
     }else if($_GET["login_message"]=="password_right"){ 
     		echo"Welcome！<br>"; 
     } 
} 
if(is_login()){ 
     echo "欢迎".$_SESSION['name']."来耍!<br/>"; 
     echo "<a href='logout.php'><br><br>登出</a>"; 
     return; 
} 
$name = ""; 
if(isset($_COOKIE["name"])){ 
     $name = $_COOKIE["name"]; 
} 
$password = ""; 
if(isset($_COOKIE["password"])){ 
     $password = $_COOKIE["password"]; 
} 
?> 
<form action="logprocess.php" method="post"> 
<div class="a">	
<label for="exampleInputName2">用户名:</label><input type="text" name="name" size="11" value="<?php echo 
$name?>" /><br/></div> 
<div class="b">		
<label for="exampleInputName2">密码：</label><input type="password" name="password" size="11" value="<?php 
echo $password?>" /><br/></div>
<!--	
<div class="c">		
<label for="exampleInputName2">验证码</label><input type="text" name="checknum" size="6"/>
	
	</div>

<?php /*
$checknum  =  "";
$checknum .= mt_rand(0,9);
$checknum .= mt_rand(0,9);
$checknum .= mt_rand(0,9);
$checknum .= mt_rand(0,9);
$_SESSION['checknum'] = $checknum;
echo $checknum;
*/
?>-->
<br/>
<div class="d">	
<label for="exampleInputName2">状态将保留一小时</label></div><br/> 
<input type="submit" value="登录" /> 
</form> 
