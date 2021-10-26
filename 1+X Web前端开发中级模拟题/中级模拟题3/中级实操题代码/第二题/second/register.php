<?php
//引入conn.php页面
______(15)_______;
$username=$_POST['username'];
$password=$_POST['password'];
// 判断用户是否已经存在
$sqlUsername="____(16)_____ username from admin where username='$username'";
$resultUsername = mysqli_query($conn, $sqlUsername);

if($resultUsername && mysqli_num_rows($resultUsername)>0){
	$res = array(
	    'code'=>2,
	    'message'=>'用户名已经存在'
	);
}else{
	//插入SQL语句，并发送
	$sql="___________(17)________________";
	$result = mysqli_query($conn, $sql);
	//解析结果集
	if($result){
	    $res = array(
		    'code'=>1,
		    'message'=>'注册成功'
		);
	}else{
	    $res = array(
		    'code'=>0,
		    'message'=>'注册不成功'
		);
	}
	
}
//将$res转成json
echo_____(18)_____;
//关闭数据库
_____(19)________;
?>