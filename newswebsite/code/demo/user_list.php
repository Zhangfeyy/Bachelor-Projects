
<html lang="cn">
 <head>
    <link 
    rel="stylesheet"
     type="text/css" href="css/index.css" />    
</header>
    
     
<body>
	
<?php 
header("content-Type: text/html; charset=Utf-8");
@include_once("functions/database.php");
include_once("functions/page.php");
include_once("functions/is_login.php");
if(!session_id()){
	session_start();
}
		if(isset($_GET['url'])) {
			$t = $_GET['url'];
		} else {
			$t = 'newslist.php';
		}
		
		$keyword = "";

    if(isset($_GET["keyword"])){
	$keyword = trim($_GET["keyword"]);
	$search_sql = "select * from news where title like '%$keyword%' or content like '%$keyword%' order by news_id desc";
}
	?>	
	

	
	<!-- 导航部分 -->
    <nav>
        <div class="w">
            <div class="nav_box ">
                <h1>洋葱新闻</h1>
                <div class="search bar">
                    <form action = "index2.php?url=news_list.php" method="get">
                       <input type="text" class="form-control" name="keyword" value="<?php echo $keyword?>" placeholder="输入查找内容">
                         <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search "></span></button>
                    </form>
                </div>
                <div class="navContent">
                    <ul>
                      <li><a href="index2.php" <?php if($t == 'index2.php') echo "class='on'"; ?>>首页</a></li>
                        <li><a href="review_list.php" <?php if($t == 'reviewlist.php') echo "class='on'"; ?>>评论管理</a></li>
                        <li><a href="cat_list.php" <?php if($t == 'cat_list.php') echo "class='on'"; ?>>分类管理</a></li>
                        <li><a href="newsadd2.php" <?php if($t == 'newsadd2.php') echo "class='on'"; ?>>新闻发布</a></li>
						<li><a href="user_list.php?url=userlist.php" <?php if($t == 'userlist.php') echo "class='on'"; ?>>用户管理</a></li>
                    <li><a href="reg.php" <?php if($t == 'reg.php') echo "class='on'"; ?>>用户注册</a></li>
                      </ul>
            </div>
        </div>
    </nav>



<style type="text/css">
	  .leftbox {
  padding:40px;
margin-top: 150px;
  margin-left: 100px;
  width:85%;
  float:left;	
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  height:1000px;	  
  }	
	.bb{
		width:80%;
		margin:10px;
		margin-top:400px;
	}
        table
        {
            border-collapse: collapse;
			position: absolute;
            margin-top: 150px;
			margin-left: 300px;
			margin-right:100px;
            text-align: center;
			box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }
        table td, table th
        {
            border: 1px solid #80DDC5;
            color: #666;
            height: 30px;
        }
        table thead th
        {
            background-color: #D9F9F7;
            width: 100px;
        }
        table tr:nth-child(odd)
        {
            background: #fff;
        }
        table tr:nth-child(even)
        {
            background: #F5FAFA;
        }
	.h2{
		float:left;
	}
			 .page{
		position:absolute;
		margin-top: 400px;
		margin-left:900px;	 
		font-size: 25px;
			 
			 
		 }	 

	
</style>
	
	
      <div class="leftbox">		  
		  
<span><h2>用户管理</h2></span>
		
		
<div class="cc">
<table class="tt">
	<thead>
		<tr>
		   <th><h2>用户名</h2></th>
	       	<th><h2>密码</h2></th>
			<th><h2>操作</h2></th>	
		</tr>
	</thead>
		
<?php 
connect1(); 
//分页的实现 
$page_size = 5; 
$search_sql = "select * from users order by user_id desc";
$result_news = mysqli_query($connection,$search_sql);
$total_records = mysqli_num_rows($result_news);					
	
if(isset($_GET["page_current"])){ 
     $page_current = $_GET["page_current"]; 
}else{ 
     $page_current=1; 
} 
$start = ($page_current-1)*$page_size; 
	
	
	
	
$search_sql = "select * from users limit $start,$page_size"; 
							  
 
$result_set = mysqli_query($connection,$search_sql); 
if(mysqli_num_rows($result_set)==0){ 
     exit("no records！"); 
}		
while($row = mysqli_fetch_array($result_set)){ 
?> 
<tr> 
<td style="width:400px;">
     	<p><?php echo $row['name']?></p> 
</td>
<td style="width: 400px;">
     	<p><?php echo  $row['password']?></p>
</td> 	
<td style="width: 400px;">
     <a href="user_delete.php?user_id=<?php echo $row['user_id']?>">删除</a> 
</td>

</tr> 
<?php 
} 
?> 
</table> 	
</div>
		  <div class="page">
	<?php
$url = $_SERVER["PHP_SELF"];
page($total_records, $page_size, $page_current, $url, $keyword);
?>
		  </div>
</div>		
</body>		
</html>	



				
				
									 
						 
						 
						 
						 
						 
