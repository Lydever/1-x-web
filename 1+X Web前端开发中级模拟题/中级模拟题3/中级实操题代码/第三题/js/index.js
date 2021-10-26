//滚动事件
window.onscroll=function(){
	// 获取id为top的元素
	var top=document.getElementById("top");
	// 判断距离顶部的距离
	if(window.pageYOffset>0){
		// 设置top元素的top值
		top.style.top=0;
	}else{
		top.style.top=-71+"px";
	}
}