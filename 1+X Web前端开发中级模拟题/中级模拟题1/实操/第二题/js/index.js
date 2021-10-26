$(function(){
	var num=1;//当前页数
var pageCount=7;//每页显示的数量
var pageNum=0;//总页数
	function ajaxDate(num){
		$.ajax({
			url: 'http://localhost/second/adminList.php',
			type: 'get',
			dataType: 'json',
			data: {
				___(10)_____//传递的参数
			},
			success:function(res){
				pageNum=___(11)_______;//请求的总页数
				res.list.forEach(function(data){
					var str="<li>"+
							"<h2><a href=''>"+data.title+"</a></h2>"+
							"<span>"+ data.time+"</span>"+
							"</li>";
					___(12)_______;//将字符串追加到指定的位置
				})
			}
		})
	}
	ajaxDate(num);

	$(window).scroll(function(){
		var sTop=____(13)__;//获取滚动条卷进去的距离，用jquery
		var sHeight=____(14)_____;//获取可视区域的高度，用jquery
		var bodyH=______(15)________;//获取页面所有内容的高度，用jquery
		if(___(16)_____){//请写出判断条件
			num++;
			if(____(17)____){//请写出判断条件
				console.log(num);
				___(18)______;//调用函数请求加载数据
			}
		}
	})
	
})