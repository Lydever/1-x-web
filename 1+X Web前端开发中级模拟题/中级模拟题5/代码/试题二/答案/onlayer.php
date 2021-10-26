<?php
$lid=  $_GET['lid'];		//接收传来的id参数
$sql = "select id,lid,mname,lng,lat from marks where lid=$lid";		//根据传来的id查询marks表对应数据(3分)
$mysqli = new MySQLi('localhost','root','root','map',3306);
$mysqli->set_charset('utf8');
$rs = $mysqli->query($sql);			//执行查询sql语句 (2分)
$arr = [];
while($row = $rs->fetch_object()){
	$arr[]=$row;
}
$jsonStr =  json_encode($arr);	                    //$rs转为json格式(2分)
echo $jsonStr;
?>
