<?php
	header("Content-Type:text/html;charset=gbk");
	include "check.php";
	$username=$_COOKIE['username'];
	setCookie("username");
	setCookie("uid");
	setCookie("islogin");
	
	echo $username."�ټ�!";
	echo "<a href='demo.php'>���µ�¼</a>";
?>