<?php
$lid=  ____(1)_____;		//接收传来的id参数
$sql = "____(2)_____";		//根据传来的id查询marks表对应数据
$mysqli = new MySQLi('localhost','root','','map',3306);
$mysqli->set_charset('utf8');
$rs = ____(3)_____;			//执行查询sql语句
$arr = [];
while($row = $rs->fetch_object()){
	$arr[]=$row;
}
$jsonStr = ____(4)_____;	 //$arr转为json格式
echo $jsonStr;
?>
