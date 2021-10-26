<?php
	if(isset($_POST['sub'])){
		$uname= $_POST['uname'];          //参数接收
		$pwd = $_POST['pwd'];
		$nickname = $_POST['nickname'];
		//导入connPool
		require_once('connPool.php');
		$connPool = ConnPool::getSingleTon();	//调用connPool中的方法实例化ConnPool 
		$sql = 'insert into users (uname,pwd,nickname) values(?,?,?)';		//写注册sql语句(插入语句)
		$param = [$uname, $pwd, $nickname];	//填写参数数组	
		$prep = $connPool->executeSql($sql,$param);		//调用执行sql语句方法
		echo '<script>alert("插入成功");</script>';
		return;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<!-- 根据上下文填写提交地址 -->
		<form method="post" action="register.php">     
			<table align="center" border="1">
				<tr>
					<td colspan="2" align="center">注册</td>
				</tr>
				<tr>
					<td align="right">账号:</td>
					<td><input type='text' name='uname'></td>
				</tr>
				<tr>
					<td align="right">密码:</td>
					<td><input type='text' name='pwd'></td>
				</tr>
				<tr>
					<td align="right">昵称:</td>
					<td><input type='text' name='nickname'></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type='submit' name='sub' value='注册'>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
