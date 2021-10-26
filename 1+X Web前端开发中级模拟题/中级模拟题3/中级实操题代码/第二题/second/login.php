<?php
//引入conn.php页面
______(15)_______;

$username=$_POST['username'];
$password=$_POST['password'];

//4.定义SQL语句，并发送
$sql="_________(20)____________";
$result = mysqli_query($conn, $sql);

//5.解析结果集
if($result && mysqli_num_rows($result)>0){
    $res = array(
	    'code'=>1,
	    'message'=>'登录成功'
	);
}else{
    $res = array(
	    'code'=>0,
	    'message'=>'用户名密码输入有误'
	);
}
//将$res转成json
echo_____(18)_____;
//关闭数据库
_____(19)________;

?>