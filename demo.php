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
				setCookie("islogin",true);		//�������http only���ԣ���xss; 
				
				header("Location:index.php");
			}
		
			echo "�û����������������</br>";
		}else{
			echo "��֤�벻��ȷ";
		}
	}
?>
<html>
	<head><title>��Ṥ��ѧ����ƽ̨</title>
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
			��֤��:<input type="text" name="check" width="30px" height="25px"></br>
			<img src="include/validcode.php" id="code"/><a href="javascript:changeCode()">�����壬��һ��</a></br>
			<input type="submit" value="check" name="sub" >
			</form>
			</div>
		<div>
	</body>
</html>
