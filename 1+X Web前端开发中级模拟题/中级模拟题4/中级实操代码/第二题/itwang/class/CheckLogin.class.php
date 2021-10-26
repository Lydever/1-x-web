<?php

class  CheckLogin {
	
	//构造方法，在实例化这个类的时候自动执行。
	function __construct(){
		session_start();
		if(!$_SESSION["name"]){
			echo "<script>alert('请先登录');location.href='login.php'</script>";
		}
		
		
	}
	
	
	
	
	

}
?>