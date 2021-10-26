<?php
//专门的验证数据的类

class Validate {
	//验证用户名 的方法
	//用户名可以使用中文、英文、数字组合长度3-60
	public static function isUser($val) {
		if (preg_match("/^[\x80-\xffa-zA-Z0-9]{3,60}$/", $val)) {
			return true;
		} else {
			return false;
		}
	}
	//验证邮箱的方法
	public static function isEmail($val) {
		if (preg_match("/\w+([+-.]\w+)*@\w+([+-.]\w+)*\.\w+([+-.]\w+)*/i", $val)) {
			return true;
		} else {
			return false;
		}
	}
	
	
	//密码可以使用特殊符号、英文、数字组合长度3-60
	public static function isPsw($val) {
		if (preg_match("/^[\~\!\@\#a-zA-Z0-9]{3,60}$/", $val)) {
			return true;
		} else {
			return false;
		}
	}
	
		
	public static function isCode($val) {
		if (preg_match("/^[A-Za-z0-9]{4}$/", $val)) {
			return true;
		} else {
			return false;
		}
	}
	
	//检验格式不合法自动调回login页面
	public static function jump($url){
		echo "<script>setTimeout(function(){location.href='".$url."'},2000)</script>";
	}
	

}
?>