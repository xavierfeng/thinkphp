<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\www\thinkphp\public/../application/home/view/default/index\vactivitydetail.html";i:1511955412;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>小区活动详情</title>

    <!-- Bootstrap -->
    <link href="/static/statics/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/statics/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/home/index/index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/home/index/fuwu.html" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/home/index/faxian.html" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a  id="my" href="javascript:;" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">
        <div class="blank"></div>
        <h3 class="noticeDetailTitle"><strong><?php echo $info['title']; ?></strong></h3>
        <div class="noticeDetailInfo">关键字:<?php echo $info['keywords']; ?></div>
        <div class="noticeDetailInfo">发布时间：<?php echo time_format($info['create_time']); ?></div>
        <div><a id="join" href="javascript:;">参加活动</a></div>
        <div class="noticeDetailContent">
            <?php echo $infoContent['content']; ?>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/static/static/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/static/statics/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(function(){
        var login = "<?=is_login()?>";
        $("#join").click(function(){
           if(login!=0){
               var user_id=login;
               var activity_id="<?php echo $info['id']; ?>";
               $.post("/home/index/join.html",{user_id:user_id,activity_id:activity_id},function(data){
                   if(data=="success"){
                       alert("报名活动成功!")
                   }else{
                       alert("你已报名此活动")
                   }
               })
           }else{
               alert("请先登录");
               window.location="/user/login/index.html"
           }
        })
    })
</script>
<script>
    $(function(){
        $("#my").click(function(){
            var login ="<?=is_login()?>";
            if(login){

                window.location="/user/user/my.html";
            }else{
                alert("请先登录");
                window.location="/user/login/index.html";
            }
        });

    })
</script>
</body>
</html>