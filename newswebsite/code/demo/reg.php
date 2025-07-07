<html lang="cn">
<head>
<link 
rel="stylesheet"
type="text/css" href="css/index.css"/> 
<title>注册页面</title>      
</head>
<style>
.a{
            position:absolute;
            top:200px;
            right:400px;
            left:400px;
            width: 1100px;
            height: 550px;
            box-shadow: 0 5px 15px rgba(0,0,0,.8);
            display: flex;
        }
        .b{
            width: 800px;
            height: 550px;
            background-image: url("pics/pic3.jpeg");
            /* 让图片适应大小 */
            background-size: cover;
        }
        .c{
            width: 300px;
            height: 550px;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .d{
            width: 250px;
            height: 500px;
        }
        .d h1{
            font: 900 30px '';
        }
        .e{
            width: 230px;
            margin: 20px 0;
            outline: none;
            border: 0;
            padding: 10px;
            border-bottom: 3px solid rgb(176, 176, 216);
            font: 900 16px '';
        }
        .g{
            float:right;
            margin: 10px ;
            display: block;
            width: 100px;
            height: 60px;
            font: 900 30px '';
            text-decoration: none;
            line-height: 50px;
            border-radius: 30px;
            background-image: linear-gradient(to left,
            #c0e3e8,#91dca0);
            text-align: center;
        }
        .h{
            float:left;
            margin: 10px;
            display: block;
            width: 100px;
            height: 60px;
            font: 900 30px '';
            text-decoration: none;
            line-height: 50px;
            border-radius: 30px;
            background-image: linear-gradient(to left,
            #e3ebb8,#91dca0);
            text-align: center;
        }






</style>





<body>
    <nav>
        <div class="w">
            <div class="nav_box ">
                <h1>洋葱新闻</h1>
                <div class="search bar">
                    <form>
                        <input placeholder="乌克兰" name="cname" type="text">
                        <button type="submit"></button>
                    </form>
                </div>
                <div class="navContent">
                    <ul>
                  <li><a href="index2.php">首页</a></li>
                        <li><a href="review_list.php">评论管理</a></li>
                        <li><a href="cat_list.php" >分类管理</a></li>
                        <li><a href="newsadd2.php">新闻发布</a></li>
						<li><a href="user_list.php">用户管理</a></li>
                    <li><a href="reg.php" >用户注册</a></li>
                      </ul>
            </div>
        </div>
    </nav>








    <div class="a">
        <div class="b"></div>
        <div class="c">
            <div class="d">
                <h1>注册账号</h1>
				<form method="post" enctype="multipart/form-data" action="register.php" charset="Utf-8" id="form_test">
                <input type="text" class="e" name="username" placeholder="USER NAME">
    
                <input type="password" name="password" class="e" placeholder="PASSWORD">
                <button type="submit" class="h"><font color="white">注册</font></a></form>
            </div>
        </div>
    </div>




    <footer>
        <div class="bottom">       
        <p class="copy">版权归张菲娅所有 Copyright &copy;2022</p>
    </div>
    </footer>
</body>
</html>







