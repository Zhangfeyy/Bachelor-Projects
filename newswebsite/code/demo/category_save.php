<?php
header("content-Type: text/html; charset=Utf-8");
include("functions/database.php");
$category = $_POST["category"];
if(!empty($category)){
	$sql = "insert into category values(null,'$category')";
	connect1();
	mysqli_query($connection,$sql);
	header("Location:cat_list.php?url=cat_list.php");
}else{
	echo "插入的数据不能为空，请重新输入";
}
?>