<?php
class ConnPool{
	private static $thisa=null;
	static function getSingleTon(){
		if(self::$thisa==null){
			self::$thisa = new ConnPool();
		}
		return self::$thisa;
	}
	private function __construct(){
		
	}
	function getConn(){
		$conn = new PDO('mysql:host=localhost;dbname=members','root','root');
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$conn->exec("SET NAMES 'utf8';");
		
		return $conn;
	}
	
	function executeSql($sql,$param,$conn=null){
		if($conn==null){
			$conn = $this->getConn();
		}
		$prep = $conn->prepare($sql);
		$len = count($param);
		for($i=1;$i<=$len;$i++){
			$prep->bindParam($i,$param[$i-1]);
		}
		$prep->execute();
		return $prep;
	}
}