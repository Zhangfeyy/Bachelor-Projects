




<style>
	.button {
    background-color:#80DDC5;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
	
	
	.article{
		width:1600px;
		margin:0 auto;
		padding:20px;	
		box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);	
	}

	.text1{	
		text-align:center;
		font-size: 40px;
	    padding:20px;}
	.text2{	
		text-align:center;
		font-size: 25px;
		color: gray;
	    padding:20px;}
	.text3{	
		text-align:left;
		font-size: 30px;
		color: black;
	    padding:30px;}
	
		.rev1{
		width:1600px;
		margin:0 auto;
		padding:20px;
		height:50px;	
		box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
		font-size: 30px;
		color:gray;	
	}
		.rev2{
		width:1600px;
		margin:0 auto;
		padding:20px;	
		box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
		font-size: 30px;
		color:gray;	
	}

	
	
</style>
<?php
include ("functions/database.php");
$news_id = $_GET["news_id"];
$detail_update_sql="update news set clicked=clicked+1 where news_id=$news_id";
$detail_sql="select*from news where news_id=$news_id";
$detail_review_sql="select*from review where news_id=$news_id and state='checked'";
connect1();
mysqli_query($connection,$detail_update_sql);
$resultnews=mysqli_query($connection,$detail_sql);
$resultreview=mysqli_query($connection,$detail_review_sql);
$count_news=mysqli_num_rows($resultnews);
$count_review=mysqli_num_rows($resultreview);
if($count_news==0){
    echo"The news doesn't exit or is deleted!";
    exit;
}
//根据新闻信息中的user_id查询对应的用户信息 
$news = mysqli_fetch_array($resultnews); 
$user_id = $news["user_id"]; 
$sql_user = "select * from users where user_id=$user_id"; 
$result_user = mysqli_query($connection,$sql_user); 
$user = mysqli_fetch_array($result_user); 
//根据新闻信息中的category_id查询对应的新闻类别信息 
$category_id = $news["category_id"]; 
$sql_category = "select * from category where category_id=$category_id"; 
$result_category = mysqli_query($connection,$sql_category); 
$category = mysqli_fetch_array($result_category); 
mysqli_free_result($result_user); 
mysqli_free_result($result_category); 
mysqli_free_result($resultnews); 
mysqli_free_result($resultreview); 
//显示新闻详细信息 
?>

<div class="tpline">
	<a href="index2.php" class="button">back</a>
</div>
<div class="article">
<h3 class="text1"><?php echo $news['title']?></h3>
<p class="text2">Writer:<?php echo $user['name'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Category:<?php echo $category['name'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time:<?php echo $news['publish_time'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clicked:<?php echo $news['clicked'];?></p>
<div class="text3"><?php echo $news['content'];?></div>

<p><a href="download.php?attachment=<?php echo urlencode($news['attachment']);?>"><?php echo $news['attachment'];?></a></p>
</div>


<br><br><br><p class="rev1">
<?php 
//显示查看评论超链接
if($count_review>0){ 
     echo "<a href='newsreview.php?url=newsreview.php&news_id=".$news['news_id']."'>There are &nbsp&nbsp".$count_review."&nbsp&nbsp reviews</a><br/>"; 
	
	
}else{ 
     echo "No review!<br/>"; 
} 
?>
</p>	
	
<br> 
<div class="rev2">
<form action="review_save.php" method="post">
	
Add Reviews:<br><br><textarea name="content" cols="80" rows="5"></textarea><br> 
<input type="hidden" name="news_id" value="<?php echo $news['news_id'];?>"> 
<br><input type="submit" value="review" class="button"> 
</form>
</div>	
