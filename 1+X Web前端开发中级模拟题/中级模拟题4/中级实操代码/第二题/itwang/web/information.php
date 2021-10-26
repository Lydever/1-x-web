<?php
// 在(1)处补齐代码，开启session
（1）;
// 在（2）处补齐代码，使用相对路径，以../开头，导入config.php文件
require_once"（2）";
//自动加载类
spl_autoload_register(function($name){
	require_once"../class/{$name}.class.php";
});
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<title>项目实战</title>
	<link rel="stylesheet" href="./dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php require_once"./common/header.html";?>
<div id="information">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="container-fluid" style="padding:0;">
					<?php
						//连接数据库遍历数据
						// 在(3),(4),(5),(6)位置根据配置文件中常量分别填写域名，用户名，密码，数据库
						$mysqli=new mysqli((3),(4),(5),(6));
						if ($mysqli->connect_errno) {
						    die('连接失败: ' . $mysqli->connect_error);
						}
						// 设置字符编码
						$mysqli->query("set names utf8");
						//在（7）处补全代码，计算数据表中数据总数
						$total=$mysqli->query("select id from information where status=1")->（7）;
						
						//根据上下文，在（8）处补全代码，设置每页条数的变量 
						(8)=5;
						//在（9）处补全代码，向上取整  
						$maxpage=（9）($total/$showrow);
						//当前页面,如果从前端通过get方法获取了当前页，就给$currentP,否则就是1
						$currentP=empty($_GET['page']) ? 1 : ($_GET['page']>$maxpage?$maxpage:$_GET['page']);
						// mysqli预处理语句
						// 在（10）处填写当前页变量，在(11)处填写每页条数变量
						if($stmt=$mysqli->prepare("select * from information where status=1 limit ".(( （10）-1)* $showrow)." , {（11）}")){    
						$stmt->execute();   //执行语句
						$stmt->bind_result($id,$title,$content,$author,$image,$time,$status);   //绑定字段
						// 在（12）处填写条件循环关键字
						（12） ($stmt->fetch()) {
						?>	
						<div class="row info-content">
						<div class="col-md-5 col-sm-5 col-xs-5">
							<img src="../public/<?php echo $image; ?>" class="img-responsive" alt="" style='width:300px;height:150px;'>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7">
							<h4><?php echo $title; ?></h4>
							<p class="hidden-xs"><?php echo mb_substr($content, 0,20,"utf-8")."......"; echo "<a href='detail.php?id={$id}'>[阅读全文]</a>"; ?></p>
							<p><?php echo $author;  echo "&nbsp;&nbsp;&nbsp;&nbsp;".date("Y/m/d",$time); ?></p>
						</div>
					</div>
					<?php		
						}
						$stmt->close();
					}
						?>
				</div>
				<div>
					<?php
					if($total>$showrow){
						// 在（13）处补全代码，实例一个分页类，在（14）处填写数据总是的变量
						$page=new （13）(（14）,$showrow);
						// 根据page类，分析并填写（15）处调用方法
						echo $page->(15)(3,4,5,6,7);
					}
					?>
				</div>	
			</div>
			<div class="col-md-4 info-right hidden-xs hidden-sm">
				<blockquote>
					<h2>热门资讯</h2>
				</blockquote>
				<div class="container-fluid">
					<?php
					//sql语句中的分组group by 、 排序  order  by 、limit  5     
					
					$res=$mysqli->query("select inforid from hot group by inforid order by count(inforid) desc limit 5;");
					
					while ($row=$res->fetch_array()) {
						//查询最热门 的资讯的详情						
						$re=$mysqli->query("select * from information where id=".$row[0]);
						$rows=$re->fetch_array(1);
					?>
					<div class="row">
						<div class="col-md-5 col-sm-5 col-xs-5" style="margin: 12px 0; padding: 0">
							<img src="/project/public/<?php echo $rows["image"] ;?>" class="img-responsive" alt="">
						</div>
						<div class="col-md-7 col-sm-7 col-xs-7" style="padding-right: 0">
							<h4><?php echo $rows["title"] ;?></h4>
							<p><?php echo $rows["author"] ;echo date("Y/m/d",$rows["time"]);?></p>
						</div>
					</div>
					<?php
					};
					?>
		
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$mysqli->close(); 
	require_once"common/footer.html";
	?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>