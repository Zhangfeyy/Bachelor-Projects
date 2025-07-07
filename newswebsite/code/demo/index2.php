<html lang="cn">
 <head>
    <link 
    rel="stylesheet"
     type="text/css" href="css/index.css" />
	 
	 <?php 
header("content-Type: text/html; charset=Utf-8");
@include_once("functions/database.php");
include_once("functions/page.php");
	?>	

	 
	 
	 
	 
	 
	 
	 <style>
		 .page{
		position:absolute;
		margin-top: 400px;
		margin-left:800px;	 
		font-size: 25px;
			 
			 
		 }	 
		 
		 
		 
		 
  .leftbox {
  padding:40px;
  margin:60px;
  width:60%;
  float:right;	
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  height:800px;	  
  }
.cc{
		width:80%;
		margin:10px;
	}
        table
        {
            border-collapse: collapse;
			position: absolute;
			margin-left: 200px;
			margin-right:200px;
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
            background-color:#97F0C5;
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
   
	 </style>

	 
	 
	 <Script>
	window.addEventListener('load', function() {
    var banner = document.querySelector('.banner')
    var imgs = document.querySelectorAll('.bannerbox>li')
    var points = document.querySelectorAll('.bannerbox2>li')
    var index = 0

    function changeOne(type) {
        imgs[index].className = ''
        points[index].className = ''
        if (type === true) {
            index++
        } else if (type === false) {
            index--
        } else {
            index = type
        }
        if (index >= imgs.length) {
            index = 0
        }
        if (index < 0) {
            index = imgs.length - 1
        }
        imgs[index].className = 'active'
        points[index].className = 'active'
    }
    banner.addEventListener('click', function(e) {
        e = e || window.event
        if (e.target.className === 'LeftBtn') {
            changeOne(false)
        }
        if (e.target.className === 'RightBtn') {
            changeOne(true)
        }
        if (e.target.dataset.name === 'point') {
            var i = e.target.dataset.i - 0
            changeOne(i)
        }
    })

    var time = setInterval(function() {
        changeOne(true)
    }, 5000)
    banner.onmouseover = function() {
        clearInterval(time)
    }
    banner.onmouseout = function() {
        time = setInterval(function() {
            changeOne(true)
        }, 5000)
    }

})
	
	
	
	
	</Script>
	 
	 
</header>
    
     
<body>
	
<?php 
		if(isset($_GET['url'])) {
			$t = $_GET['url'];
		} else {
			$t = 'index2.php';
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
			</div></div>
    </nav>

    <div class="banner "><!--横幅展示-->
        <ul class="bannerbox">
            <li class="active"><img src="pics/pic1.jpeg" alt=""></li>
            <li><img src="pics/pic2.jpeg" alt=""></li>
            <li><img src="pics/pic3.jpeg" alt=""></li>
        </ul>
    
        <ol class="bannerbox2">
            <li data-i="0" data-name="point" class="active"></li>
            <li data-i="1" data-name="point"></li>
            <li data-i="2" data-name="point"></li>            
        </ol>
        <div class="LeftBtn">&lt; </div>
        <div class="RightBtn">&gt;</div>
        <div class="synopsis">
            <p>欢迎来到夏天,祝你生活快乐</p>
        </div>
        
    </div>
		
		
		
<!--侧边登录-->
<div class="rightbox">
<div class="list">
<h2>登录</h2>    
<div id="sidebar">
            <div class="login">
                <?php include("login2.php"); ?>
            </div>
			</div>
</div></div> 		
	
		

<!--新闻卡片-->

      <div class="leftbox">
<span><h2>新闻列表</h2></span>		  
<div class="cc">
<table class="tt">
	<thead>
		<tr>
			<th><h2>新闻标题</h2></th>
			<th width="40"><h2>操作<h2></th>
			<th width="40"><h2>操作<h2></th>
		</tr>
	</thead>
<?php 
connect1(); 
//分页的实现
$search_sql = "select * from news order by news_id desc";
$result_news = mysqli_query($connection,$search_sql);
$total_records = mysqli_num_rows($result_news);				
$page_size = 5; 
if(isset($_GET["page_current"])){ 
     $page_current = $_GET["page_current"]; 
}else{ 
     $page_current=1; 
} 
$start = ($page_current-1)*$page_size; 
$search_sql = "select * from news order by news_id desc limit $start,$page_size"; 
if(isset($_GET["keyword"])){ 
     $keyword = $_GET["keyword"]; 
     //构造模糊查询新闻的SQL语句 
     $search_sql = "select * from news where title like '%$keyword%' or content like '%$keyword%' order by news_id desc limit $start,$page_size"; 
} 
$result_set = mysqli_query($connection,$search_sql);				
				
				
if(mysqli_num_rows($result_set)==0){ 
     exit("no records！"); 
} 
						 						 
while($row = mysqli_fetch_array($result_set)){ 
?> 
<tr>
	
<td style="width: 1000px;"><h3>
     	<a href="newsdetail.php?news_id=<?php echo $row['news_id']?>"><?php echo $row ['title']?></a></h3> 
</td> 
<td style="width: 300px;"><h3> 
     <a href="newsedit2.php?news_id=<?php echo $row['news_id']?>">编辑</a></h3> 
</td> 
<td style="width: 300px;"><h3>
     <a href="newsdelete.php?news_id=<?php echo $row['news_id']?>">删除</a></h3> 
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
    
 
   
<!-- 底部 start -->
<footer>
    <div class="bottom">       
    <p class="copy">版权归张菲娅所有 Copyright &copy;2022</p>
</div>
</footer>
</body>
</html>

 