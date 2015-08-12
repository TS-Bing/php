<html>
<head>
<title>社会工程学</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
<div id="container">
	<div id="header">
	<?php	echo "用户<b>".$_COOKIE["username"]."</b>您好!</br>";
	echo "<a href='logout.php'>退出</a>";?>
	</div>
	
	<div class="nav"></div>
	
	<div id="main">
		<div id="search">
		<form enctype="multipart/form-data" action="" method="post">
		<select name="l" class="isselect"> 
			<option value="like" selected="selected">模糊搜索</option> 
			<option value="know">精确搜索</option> 
		</select>
		
		<select name="t" class="isselect"> 
			<option value="username" selected="selected">用户名称</option> 
			<option value="email">邮箱地址</option> 
			<option value="idcard">身份证件</option> 
			<option value="mobile">移动电话</option> 
			<option value="site">来源站点</option> 
		</select> 
		
		
		<input type="text" value="大爷 请输入关键字!" name="q" class="input1" />
		<!-- <input type="submit" name="sbmit" class="sub" value="search" src="1.gif"/> -->
		
		<input type="image" name="sbmit" value="search" class="sub" src="image/1.gif" onclick="this.form.submit()"/> 
		</form>
		</div>
		
		<div id="content">
		<?php 
			include("search.php");			
		?>
		</div>
	</div>
	
	<div class="nav"></div>
	
	<div id="footer">di</div>
</div>
</body>
</html>