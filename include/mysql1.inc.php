<?php
class mysql {
	private $host;
	private $name;
	private $pass;
	private $data;
	
	function __construct($host,$name,$pass,$data) {
		$this->host=$host;
		$this->name=$name;
		$this->pass=$pass;
		$this->data=$data;
		$this->connect();
		
	}
	
	function connect(){
		$link=mysql_connect($this->host,$this->name,$this->pass) or die ("error");
		mysql_select_db($this->data,$link);
	}
}
$db = new mysql('localhost','common_user','1234','shenggong');

?>