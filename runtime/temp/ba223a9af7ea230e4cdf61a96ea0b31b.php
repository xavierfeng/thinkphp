<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"D:\www\thinkphp\tp5\public/../application/home/view/default/index\index.html";i:1511683982;s:76:"D:\www\thinkphp\tp5\public/../application/home/view/default/base\common.html";i:1511682342;s:73:"D:\www\thinkphp\tp5\public/../application/home/view/default/base\var.html";i:1496373782;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo config('WEB_SITE_TITLE'); ?></title>
<link href="__STATIC__/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="__STATIC__/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="__STATIC__/bootstrap/css/docs.css" rel="stylesheet">
<link href="__STATIC__/bootstrap/css/twothink.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="__STATIC__/bootstrap/js/html5shiv.js"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="__STATIC__/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="__STATIC__/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>
<!--<![endif]-->
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader'); ?>
</head>
<body>
	<!-- 头部 -->
	<!-- 导航条
	================================================== -->
	<nav class="navbar navbar-default navbar-fixed-bottom" style="background-color: white;padding: 10px;">
		<div class="container-fluid text-center">
			<div class="col-xs-3" style="width: 25%;height:40px;float: left;">
				<p class="navbar-text"><a href="/" class="navbar-link">首页</a></p>
			</div>
			<div class="col-xs-3" style="width: 25%;height:40px;float: left;">
				<p class="navbar-text"><a href="fuwu.html" class="navbar-link">服务</a></p>
			</div>
			<div class="col-xs-3" style="width: 25%;height:40px;float: left;">
				<p class="navbar-text"><a href="faxian.html" class="navbar-link">发现</a></p>
			</div>
			<div class="col-xs-3" style="width: 25%;height:40px;float: left;	">
				<p class="navbar-text"><a href="/user/login/index.html" class="navbar-link">我的</a></p>
			</div>
		</div>
	</nav>
	<!-- /头部 -->

	<!-- 主体 -->
	

	<div id="main-container" class="container">

	    <div class="row">
	        
<!-- 左侧 nav
================================================== -->


	        
<img src="/static/static/frontend/image/index.png" width="1400">
<div class="container" style="background: blue;height:200px;"></div>

	    </div>
	</div>

	<script type="text/javascript">
	    $(function(){
	        $(window).resize(function(){
	            $("#main-container").css("min-height", $(window).height() - 343);
	        }).resize();
	    })
	</script>
	<!-- /主体 -->

	<!-- 底部 -->

    <!-- 底部
    ================================================== -->
<!--
    <footer class="footer">

    </footer>
-->

	<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "__ROOT__", //当前网站地址
		"APP"    : "__APP__", //当前项目地址
		"PUBLIC" : "__PUBLIC__", //项目公共目录地址
		"DEEP"   : "<?php echo config('URL_PATHINFO_DEPR'); ?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo config('URL_MODEL'); ?>", "<?php echo config('URL_CASE_INSENSITIVE'); ?>", "<?php echo config('URL_HTML_SUFFIX'); ?>"],
		"VAR"    : ["<?php echo config('VAR_MODULE'); ?>", "<?php echo config('VAR_CONTROLLER'); ?>", "<?php echo config('VAR_ACTION'); ?>"]
	}
})();
</script>
	 <!-- 用于加载js代码 -->
	<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
	<?php echo hook('pageFooter', 'widget'); ?>
	<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
		
	</div>

	<!-- /底部 -->
</body>
</html>
