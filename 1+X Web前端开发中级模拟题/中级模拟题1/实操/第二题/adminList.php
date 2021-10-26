<?php
// header ("Content-type: text/html; charset=utf-8")
$servername = "localhost";
$username = "root";
$password = "123456";

// 创建连接
$conn = __(2)____($servername, $username, $password);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

mysqli_query($conn,'set names utf8');

// 查询数据库
mysqli_select_db($conn,"list");
// 求信息总数
$sqlCount="____(3)____";# 查询所有数据的sql语句
$resultC = ___(4)____(__(5)___, __(6)____);# 执行数据库
$count=mysqli_num_rows($resultC);

$num=$_GET["num"];
$pageCount=$_GET["pageCount"];
$start=_____(7)____;#求开始查询的索引值
// 返回指定数据
$sql = "___(8)______";#返回指定数据的sql语句
$result = mysqli_query($conn, $sql);
$res = array('count'=>$count);
$jarr=array();
// 遍历数据
while($row = _____(9)_____($result))
  {
    array_push($jarr,$row);
  }
$res = array(
    'count'=>$count,
    'list'=>$jarr
);
echo json_encode($res);
mysqli_close($conn);
?>