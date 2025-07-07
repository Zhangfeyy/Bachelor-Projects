<html lang="cn">
 <head>
   
	 <link 
    rel="stylesheet"
     type="text/css" href="css/index.css" />
	  <link 
    rel="stylesheet"
     type="text/css" href="css/layui.css" />
	 
<!-- 实现在线编写文件的插件ckeditor-->
    <title>Sample CKEditor Site</title>
    <script type="text/javascript" src="javascript/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
	    window.onload = function()
	    {
	        CKEDITOR.replace( 'content' );     //content是textarea的名称
	        CKEDITOR.WIDTH = 550;
	        $("#form_test").submit(function(e){
	    	var fileInput = $('#file_test').get(0).files[0];
	    	if(fileInput){
	    		return true;
	    	}else{
	    		alert("没有上上传文件，请上传文件");
	    		return false;
	    	}
	    });
	    };

	</script>
</head>    
     
<body>
	
<?php 
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
		
		
<div class="aa">
			
			
	<?php 
include("functions/is_login.php"); 
session_start(); 
if(!is_login()){ 
	header("Location:index2.php?login_message=password_error"); 
     return; 
} 
?> 
			
			
<form action = "newssave.php" method="post" enctype="multipart/form-data">
<div class="a1">
	   	<label class="12"><h2>文章标题</h2></label><br>
	   	<input type="text" name="title" size="100" placeholder="请输入标题">
	</div>
	<br/><br/>
	<div class="a2">
	   	<label class="12"><h2>文章内容</h2></label><br>
	   	<textarea name = "content"></textarea>
	</div>
	<br/><br/>
<div class="a3">
	   	<label class="12"><h2>文章类别</h2></label><br>
	   	<select class="form-control" name="category_id">
<?php 
include("functions/database.php");
connect1();
$sql2= "select*from category";
$result1 = mysqli_query($connection, $sql2);
@$row1 = mysqli_fetch_array($result1);
if (!$result1) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
}
while($row1 = mysqli_fetch_array($result1)){ 
?> 
     <option value="<?php echo $row1['category_id'];?>"><?php echo $row1['name'];?></option> 
<?php 
} 
?> 
</select></div><br/><br/> 
<div class="form-group">
	   	<input type="file" name = "news_file" size = "50" id="file_test">
	   	<input type="hidden" name="MAX_FILE_SIZE" value="10485760" >
	</div> 
<input type="submit" value="提交"> 
</form> 		
			
</div>
		
<!-- 底部 start -->
<footer>
    <div class="bottom">       
    <p class="copy">版权归张菲娅所有 Copyright &copy;2022</p>
</div>
</footer>		
		
		
		
		
		
</body>		

	<style>
	
	.aa{
	position:absolute;
	top:100px;
	left:150px;
	right:100px;
	bottom:100px;	
	width:80%;
	margin;50px;
	padding:20px;
	height:1200px;	
	box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);	
	background-color:#C7F0E5;
				
	}	
	
		.a1{
		width:400px;	
		}
	
	</style>
		
		
