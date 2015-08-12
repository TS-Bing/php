<?php
include "include/mysql1.inc.php";
include "check.php";
header("Content-Type:text/html;charset=utf-8");
if(isset($_POST['sbmit_x'])){
	if(!empty($_POST['l']) && !empty($_POST['t']) && !empty($_POST['q'])){
		$n1=$_POST['l'];
		$n2=$_POST['t'];
		$n3=$_POST['q'];
		$search=new search($n1,$n2,$n3);
		echo $search->result();
	}else{
		header("Location:index.php");
	}
}
class search{
	private $like;
	private $tb;
	private $key;
	
	function __construct($like,$tb,$key){
		$this->like=$like;
		$this->tb=$tb;
		$this->key=$key;
	}

	function result(){
		switch ($this->like)
		{
			case 'like':
				$this->vodlike();
				break;
			case 'know':
				$this->vod();
				break;
		}
	}

	private function vodlike(){
		$sql="show tables";
		$result=mysql_query($sql);
		while($data=mysql_fetch_assoc($result)){
			foreach($data as $col){
				$s[]="select * from $col where $this->tb like '$this->key%'";
			}
		}
		$s1=implode(" UNION ALL ", $s);
		$result1=mysql_query($s1);
		$cols=mysql_num_fields($result1)-1;	//»ñÈ¡ÁÐshu
		$rows=mysql_num_rows($result1);
		echo '<table class="tb">';
		echo '<tr class="tr">';
		$list=array('用户名','昵称','密码','邮箱','移动电话','身份证','地址','来源网站');
		foreach($list as $name){
			echo '<th class="th">'.$name.'</th>';	
		}
		echo '</tr>';
		while($data1=mysql_fetch_assoc($result1)){
			echo '<tr border=0>';
			foreach($data1 as $k=>$col){
				if($k != 'id'){
					echo '<td border=0>'.$col.'</td>';	
				}
			}
			echo '</tr>';
		}
		echo '</table>';
		echo "查询结果：{$rows}条 \t";
		$src_time = microtime(true);
		$cost = microtime(true) - $src_time;
		echo '查询花费'.$cost.'秒';
		mysql_close();
	}

	private function vod(){
		$sql="show tables";
		$result=mysql_query($sql);
		while($data=mysql_fetch_assoc($result)){
			foreach($data as $col){
				$s[]="select * from $col where $this->tb = '$this->key'";
			}
		}
		$s1=implode(" UNION ALL ", $s);
		$result1=mysql_query($s1);
		$cols=mysql_num_fields($result1)-1;	//»ñÈ¡ÁÐshu
		$rows=mysql_num_rows($result1);
		echo '<table class="tb">';
		echo '<tr class="tr">';
		$list=array('用户名','昵称','密码','邮箱','移动电话','身份证','地址','来源网站');
		foreach($list as $name){
			echo '<th class="th">'.$name.'</th>';	
		}
		echo '</tr>';
		while($data1=mysql_fetch_assoc($result1)){
			echo '<tr border=0>';
			foreach($data1 as $k=>$col){
				if($k != 'id'){
					echo '<td border=0>'.$col.'</td>';	
				}
			}
			echo '</tr>';
		}
		echo '</table>';
		echo "查询结果：{$rows}条 \t";
		$src_time = microtime(true);
		$cost = microtime(true) - $src_time;
		echo '查询花费'.$cost.'秒';
		mysql_close();
	}	
}
?>