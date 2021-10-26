<?php 
// header ("Content-type: text/html; charset=utf-8")
$servername = "localhost";
$username = "root";
$password = "123456";

// 创建连接
$conn = _____(13)_____($servername, $username, $password);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

mysqli_query($conn,'set names utf8');

// 查询数据库
_____(14)____($conn,"list");