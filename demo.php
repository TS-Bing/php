<?php
	session_start();
	if(isset($_POST['sub'])){
		if($_POST["check"]==$_SESSION["validcode"]){
			include "include/mysql.inc.php";
			$sql="select id from user where name='{$_POST["name"]}' and password='".md5($_POST['password'])."'";
			$result=mysql_query($sql);
			if(mysql_num_rows($result)>0){
				$row=mysql_fetch_assoc($result);
				$time=time()+60;
				setCookie("username",$_POST["name"],$time);
				setCookie("uid",$row['id'],$time);
				setCookie("islogin",true);		//可以添加http only属性，放xss; 
				
				header("Location:index.php");
			}
		
			echo "用户名和密码输入错误！</br>";
		}else{
			echo "验证码不正确";
		}
	}
?>
<html>
	<head><title>社会工程学测试平台</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
		<style type="text/css">
			a{
				font-size:12px;
				text-decoration:none;
				color:red;
			}
			a:hover{
				
				color:orange;
			}
		</style>
		<script type="text/javascript">
			function changeCode(){
				document.getElementById("code").src = "include/validcode.php?id="+Math.random();
			}
		</script>
	</head>
	<body>
		<div id="contianer">
			<div id="login">
			<form action="" method="POST">
			username:<input type='text' name='name'></br></br>
			password:<input type='password' name='password'></br></br>
			验证码:<input type="text" name="check" width="30px" height="25px"></br>
			<img src="include/validcode.php" id="code"/><a href="javascript:changeCode()">看不清，换一张</a></br>
			<input type="submit" value="check" name="sub" >
			</form>
			</div>
		<div>
	</body>
</html>
