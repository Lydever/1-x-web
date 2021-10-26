<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>练习用的登录页面</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/common.css" />
	</head>
	<body>
		<!--最上边top-->
		<div class="container indextop">
			<h4>中国移动互联网教育品牌</h4>
			<ul class="nav nav-pills pull-right">
				<li>
					<a href="">IT网在线学校</a>
				</li>
				<li>
					<a href="">联系我们</a>
				</li>
				<li>
					<a href="">加入收藏</a>
				</li>
				<li>
					<a href=""><img src="img/qq.png" /></a>
				</li>
				<li>
					<a href=""><img src="img/wechat.png" /></a>
				</li>
				<li>
					<a href=""><img src="img/weibo.png" /></a>
				</li>
				<li>400-025-8883</li>
			</ul>
		</div>
		<!--最上边top结束-->
		<!--导航条组件-->
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
					<a class="navbar-brand" href="#" style="margin:0;padding:0"><img src="img/news_logo.png" alt="" style="height:50px;width:auto;" /></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="#">首页</a>
						</li>
						<li>
							<a href="#">团队</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">课程系统 <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="#">web前端</a>
								</li>
								<li>
									<a href="#">室内设计</a>
								</li>
								<li>
									<a href="#">室外设计</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#">工业设计</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#">平面设计</a>
								</li>
							</ul>
						</li>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group input-group">
							<input type="text" class="form-control" placeholder="找课程">
							<div class="input-group-btn">
								<button class="btn btn-primary">提交</button>
							</div>
						</div>
					</form>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
		<!--导航条结束-->
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding-top:20px;">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" >
						<li role="presentation" >
							<a href="#login" role="tab" data-toggle="tab">登录</a>
						</li>
						<li role="presentation" class="active">
							<a href="#register" role="tab" data-toggle="tab">注册</a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content" style="padding-top:20px;">
						<div  class="tab-pane " id="login"><!-- 登录的具体表单-->
							<div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12">  <!-- 登陆的 表单左边-->
								<form  method="post" >
									<div class="input-group" style="padding-top:20px;">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-user"></i>
										</div>
										<input class="form-control" id="login" name="login" placeholder="请输入您的登录邮箱" type="email" value="">
									</div>
									<div class="input-group" style="padding-top:20px;">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-bell"> </i>
										</div>
										<input class="form-control" id="password" name="password" placeholder="请输入密码" type="password" value="">
									</div>
									<div class="input-group" style="padding-top:20px;">
										下次自动登录<input type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input class="btn btn-primary" id="submit" name="submit" type="submit" value="登录">
									</div>
								</form>
								<span style="display:block;padding-top:20px;"> <a href="###">忘记密码？</a><a href="#register" data-toggle="tab">注册新账号</a></span>
							</div>
							<div class="col-lg-4  col-md-4 col-sm-4 col-xs-12 "><!--右边使用第三方账号登录-->
								<span>直接使用第三方账号登录</span>
								<a class="btn btn-info btn-block" href="###">QQ<i class="glyphicon glyphicon-adjust"></i></a>
								<a class="btn btn-danger btn-block" href="###">微博<i></i></a>
								<a class="btn btn-success btn-block" href="###">微信<i></i></a>
								<a class="btn btn-primary btn-block" href="###">Github <i></i></a>
								<a class="btn btn-warning btn-block" href="###">人人 <i></i></a>
							</div>
						</div><!--登录结束-->
						<div role="tabpanel" class="tab-pane active" id="register">
							<div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12">  <!-- 注册的 表单左边-->
								{{-- 在（8）处补全代码，通过路由方法获取提交地址 --}}
							<form  method="post" action=" {{（8）('check')}} " novalidate >
								{{-- 在（9）处补全代码，自动生成隐藏的token控件 --}}
									{{ （9）() }}
									<div class="input-group" style="padding-top:20px;">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-user"></i>
										</div>
										<input class="form-control" id="login" name="username" placeholder="请输入您的用户名" type="text" value="">
									</div>
									
									<div class="input-group" style="padding-top:20px;">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-user"></i>
										</div>
										<input class="form-control" id="login" name="useremail" placeholder="请输入您的登录邮箱" type="email" value="">
									</div>
									
									<div class="input-group" style="padding-top:20px;">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-bell"> </i>
										</div>
										<input class="form-control" id="password" name="userpsw" placeholder="请输入密码" type="password" value="">
									</div>
									
									<div class="input-group" style="padding-top:20px;">
										<input type="text" class="form-control {{$errors->has('captcha')?'parsley-error':''}}" name="captcha" placeholder="captcha">
										{{-- 在（10）处补全代码，实现验证码 --}}
										<img src="{{（10）()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()">
									</div>
									<div class="input-group" style="padding-top:20px;">
										<span style="display:block;margin-bottom: 20px;;">点击“注册”，表示您已经同意我们的 隐私条款。</span><br />
										<input class="btn btn-primary" id="submit" type="submit" value="注册">
										<a   data-toggle="tab" href="#login">已有账号， 点击登录</a>
									</div>
								</form>
								<div>
									{{-- 在（11）处补全代码，实现判断，在（12）处补全代码，统计错误个数大于0 --}}
									@（11） (count(（12）) > 0)
										<div class="alert alert-danger">
											<ul>
												{{-- 在（13）处补全代码，填写获取所有的错误的方法 --}}
												@foreach ($errors->（13）() as $error)
												{{-- 在（14）处补全代码，显示错误 --}}
													<li>{{（14） }}</li>
													{{-- 在（15）处补全代码，foreach结束标签 --}}
												@（15）
											</ul>
										</div>
									@endif
								</div>
							</div>
							<div class="col-lg-4  col-md-4 col-sm-4 col-xs-12 "><!--右边使用第三方账号登录-->
								<span>直接使用第三方账号登录</span>
								<a class="btn btn-info btn-block" href="###">QQ<i class="glyphicon glyphicon-adjust"></i></a>
								<a class="btn btn-danger btn-block" href="###">微博<i></i></a>
								<a class="btn btn-success btn-block" href="###">微信<i></i></a>
								<a class="btn btn-primary btn-block" href="###">Github <i></i></a>
								<a class="btn btn-warning btn-block" href="###">人人 <i></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer id="footer" class="navbar-fixed-bottom">
			<div class="container">
				<p>企业培训 | 合作事宜 | 版权投诉</p>
				<p>京ICP 备12345678. © 2009-2016 IT网在线学校. Powered by Bootstrap.</p>
			</div>
		</footer>
		<script src="dist/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	</body>

</html>