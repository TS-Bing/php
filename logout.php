<?php
	header("Content-Type:text/html;charset=gbk");
	include "check.php";
	$username=$_COOKIE['username'];
	setCookie("username");
	setCookie("uid");
	setCookie("islogin");
	
	echo $username."再见!";
	echo "<a href='demo.php'>重新登录</a>";
?>