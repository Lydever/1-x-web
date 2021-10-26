<?php
		$mysqli = new MySQLi('localhost','root','root','map',3306);
		$mysqli->set_charset('utf8');
		$sql = 'select id,lname from layers';		//查询layers表的sql语句
		$rs = $mysqli->query($sql);		//执行对库查询
?>
<html>
<head>
	<style>
		html,body{
			height: 100%;
		}
		.main{
			display: flex;
			height: 100%;
		}
		.left{
			flex-grow: 1;
			flex-basis: 180px;
			border: 1px solid blue;
			height: 100%;
			text-align: center;
		}
		.map{
			flex-grow: 5;
			border: 1px solid green;
			height: 100%;
		}
		.mark{
			position: absolute;
			left:200px;
			top:200px;
			display: none;
		}
		.mtitle{
			border:1px solid blue;
		}
	</style>
	<script src='./jquery.min.js'></script>
	<script>
		alert($);
		var marksObj={};
		function addMark(row){
			mark = $('#amark').clone(true);
			mark.children(":first").html(row['mname']);
			$('#map').append(mark);
			mark.css({'display':'block','left':row['lng'],'top':row['lat']});
			marksObj[row['lid']].push(mark);
		}
		function layerChange(thisa){
			if(thisa.checked){			//加入选中的checkbox框被选中
				alert(thisa.value);
				$.get('./onlayer.php?lid='+thisa.value,function(redata){
				json = JSON.parse(redata);		//将返回的数据转为json格式		
				len = json.length;
				for(i=0;i<len;i++){
					addMark(json[i]);	//循环生成地图标记
				}
				})
			}else{
				//清空数组
				arr = marksObj[thisa.value];
				len = arr.length;
				for(i=0;i<len;i++){
					arr[i].remove();
				}
				arr.splice(0, len); //彻底清空arr数组
			}
			
		}
	</script>
</head>
<body>
	<div class='main'>
		<div class='left'>
			<form name='layerForm'>
			<?php
			while($row = $rs->fetch_object()){
			?>
				<?=$row->lname?>	<!-- 输出每个图层的名字 -->
				<input type='checkbox' name='layer' value="<?=$row->id?>" onchange='layerChange(this)'>	<!-- 输出图层id -->
				<br/>
				<script>
					marksObj['<?=$row->id?>']=[];	//添加图层
				</script>
			<?php
			}
			?>
			</form>
		</div>
		<div id='map' class='map' onclick="markA()">
			<img src='./img/mianzhi.png' width="100%" height="100%"/>
			<div id='amark' class='mark'>
				<div class='mtitle'>aaa</div>
				<img src='./img/mark.jpg' width="60" height="90">
			</div>
		</div>
	</div>
</body>
</html>
<?php
	$rs->free();
	$mysqli->close();
?>
