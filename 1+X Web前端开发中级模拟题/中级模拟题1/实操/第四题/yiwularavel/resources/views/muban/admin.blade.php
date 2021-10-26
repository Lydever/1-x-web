
<!DOCTYPE html>
<html>
<head>
	<title>管理界面</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/public.css">
	<link rel="stylesheet" type="text/css" href="css/manage.css">
	<script src='js/jquery.min.js'></script>
</head>
<body>
<div class="header">
	<h2>后台管理系统</h2>
	<p><a href="">退出</a></p>
</div>
<div class="main">
	<div class="aside">
		<ul>
			<li><a href="">基础设置</a></li>
			<li><a href="">栏目分类</a></li>
			<li><a href="">产品分类</a></li>
			<li><a href="{{ url('admin/goods') }}">产品列表</a></li>
		</ul>
	</div>
	
	@yield('content')
</div>
</body>
</html>
