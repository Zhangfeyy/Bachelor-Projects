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
include("functions/database.php"); 
$news_id = $_GET["news_id"]; 
connect1();
$resultSQL = "select*from news where news_id = $news_id";
$result_news = mysqli_query($connection,$resultSQL);
$categorySQL = "select*from category";
$result_category = mysqli_query($connection,$categorySQL);
$news = mysqli_fetch_array($result_news);		
	
?> 
			
			
<form action = "newsupdate.php" method="post" enctype="multipart/form-data">
<div class="a1">
	   	<label class="12"><h2>文章标题</h2></label><br>
	 <input type="text"  size="60" class="form-control" name="title" value="<?php echo $news['title']?>">
	</div>
	<br/><br/>
	<div class="a2">
	   	<label class="12"><h2>文章内容</h2></label><br>
		<textarea  class="form-control" name="content"><?php echo $news['content']?></textarea>
	</div>
	<br/><br/>
<div class="a3">
	   	<label class="12"><h2>文章类别</h2></label><br>
	   	<select class="form-control" name="category_id">
<?php 
while($category = mysqli_fetch_array($result_category)){ 
?> 
     <option value="<?php echo $category['category_id'];?>" <?php echo ($news ['category_id']==$category['category_id'])?"selected":""?>><?php echo $category ['name'];?> </option> 
<?php 
} 
?> 
     </select>
	</div><br/><br/> 
<input type="hidden" name="news_id" value="<?php echo $news_id?>">
<input type="submit" value="修改"> 
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
	height:900px;	
	width:80%;
	margin;50px;
	padding:20px;
	box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);	
	background-color:#C7F0E5;
				
	}		
	
	
	</style>
		
		
