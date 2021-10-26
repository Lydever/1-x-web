$(function(){
	$(".title li").click(function(){
//给点击的元素添加类，将其他元素的cur类移除
		$(this).____(21)____('cur').siblings().___(22)_____('cur');
		$(".form form").eq(__(23)____).css("display","block").____(24)____().css("display","none");
	})

	$(".loginBtn").click(function(){
//获取表单中的值
		var username=$(".login .loginUsername").__(25)____;
		var password=$(".login .loginPwd").__(25)___;
		$.ajax({
			url: 'http://localhost/second/login.php',
			type: 'post',
			dataType: '__(26)____',
			___(27)___: {
				username: username,
				password: password
			}
		})
		.done(function(data) {
			if(data.code==1){
           //登录成功加载首页
				_____(28)_______="http://localhost/second/index.html"; 
			}else{
           //弹出后台返回的message信息
				_____(30)______;
			}
		})
		
	})

	$(".registerBtn").click(function(){
		var username=$(".register .registerUsername").__(25)___;
		var password=$(".register .registerPwd").__(25)___;
		var passwordOk=$(".register .registerPwdOk").__(25)___;
       //判断两次密码输入是否一致
		if(_____(29)______){
			$.ajax({
				url: 'http://localhost/second/register.php',
				type: 'post',
				dataType: '__(26)____',
			    ___(27)___: {
					username: username,
					password: password
				}
			})
			.done(function(data) {
				if(data.code==1){
				//弹出后台返回的message信息
				    _____(30)______;
					____(28)_____="http://localhost/second/login.html"; 
				}else{
				//弹出后台返回的message信息
				    _____(30)______;
				}
			})
		}else{
			alert("密码和确认密码不一致");
		}	
	})
})