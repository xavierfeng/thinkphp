<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\www\thinkphp\public/../application/home/view/default/index\tips.html";i:1512013131;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>小区通知</title>

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
        <h1>小区活动</h1>
        <?php if(!(empty($Vactivity) || (($Vactivity instanceof \think\Collection || $Vactivity instanceof \think\Paginator ) && $Vactivity->isEmpty()))): if(is_array($Vactivity) || $Vactivity instanceof \think\Collection || $Vactivity instanceof \think\Paginator): $i = 0; $__LIST__ = $Vactivity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Vactivity): $mod = ($i % 2 );++$i;?>
        <div class="row noticeList">

            <a href="<?php echo url('VactivityDetail?id='.$Vactivity['id']); ?>">
            <div class="col-xs-2">
                <img class="noticeImg" src="<?php echo get_cover($Vactivity['cover_id'])['path']; ?>" />
            </div>
            <div class="col-xs-10">
                <p class="title"><?php echo $Vactivity['title']; ?></p>
                <p class="intro"><?php echo $Vactivity['title']; ?></p>
                <p class="info">浏览次数:<?php echo $Vactivity['view_times']; ?><span class="pull-right"><?php echo time_format($Vactivity['create_time'] ); ?></span> </p>
            </div>
            </a>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        <div class="ajaxActivity"></div>
        <button class="btn btn-info" id="getActivity">查看更多活动</button>
        <h1>小区通知</h1>
        <?php if(!(empty($notice) || (($notice instanceof \think\Collection || $notice instanceof \think\Paginator ) && $notice->isEmpty()))): if(is_array($notice) || $notice instanceof \think\Collection || $notice instanceof \think\Paginator): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$notice): $mod = ($i % 2 );++$i;?>
        <div class="row noticeList">
            <a href="<?php echo url('noticeDetail?id='.$notice['id']); ?>">
                <div class="col-xs-2">
                    <img class="noticeImg" src="<?php echo get_cover($notice['cover_id'])['path']; ?>" />
                </div>
                <div class="col-xs-10">
                    <p class="title"><?php echo $notice['title']; ?></p>
                    <p class="intro"><?php echo $notice['title']; ?><?php echo $notice['title']; ?></p>
                    <p class="info">浏览次数:<?php echo $notice['view_times']; ?><span class="pull-right"><?php echo time_format($notice['create_time'] ); ?></span> </p>
                </div>
            </a>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        <div class="ajaxNotice"></div>
    <button class="btn btn-info" id="getNotice">查看更多通知</button>
        <h1>便民服务</h1>
        <?php if(!(empty($service) || (($service instanceof \think\Collection || $service instanceof \think\Paginator ) && $service->isEmpty()))): if(is_array($service) || $service instanceof \think\Collection || $service instanceof \think\Paginator): $i = 0; $__LIST__ = $service;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$service): $mod = ($i % 2 );++$i;?>
        <div class="row noticeList">
            <a href="<?php echo url('serviceDetail?id='.$service['id']); ?>">
                <div class="col-xs-2">
                    <img class="noticeImg" src="<?php echo get_cover($service['cover_id'])['path']; ?>" />
                </div>
                <div class="col-xs-10">
                    <p class="title"><?php echo $service['title']; ?></p>
                    <p class="intro"><?php echo $service['title']; ?><?php echo $service['title']; ?></p>
                    <p class="info">浏览次数:<?php echo $service['view_times']; ?><span class="pull-right"><?php echo time_format($service['create_time'] ); ?></span> </p>
                </div>
            </a>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    <div class="ajaxService"></div>
    <button class="btn btn-info" id="getService">查看更多服务</button>

    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/static/static/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/static/statics/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#my").click(function(){
            var login ="<?=is_login()?>";
            if(login){

                window.location="/user/user/my.html";
            }else{
                alert("请先登录");
                window.location="/user/login/index.html";
            }
        });


        function getLocalTime(time) {
            return new Date(parseInt(time) * 1000).toLocaleString().replace(/\//g, "-").replace(/日/g, " ").replace(/上午|下午/g, " ");
        }
        var page=1;
        //Ajax获取小区活动
        $("#getActivity").click(function(){
            ++page;
            $.getJSON("/home/index/VactivityAjax.html",{page:page},function(data){
                if(data==""){
                    $("#getActivity").html('没有更多了!')
                }
                $.each(data,function(){
                    var that = this;
                    var cover_id=this.cover_id;
                    $.getJSON("/home/index/getPicture.html",{cover_id:cover_id},function(src){
                        $(".ajaxActivity").append("<div class='row noticeList'><a href='/home/index/VactivityDetail?id="+that.id+"'><div class='col-xs-2'><img class='noticeImg' src='"+src.path+"' /></div><div class='col-xs-10'><p class='title'>"+that.title+"</p><p class='intro'>"+that.title+that.title+"</p><p class='info'>浏览次数:"+that.view+"<span class='pull-right'>"+getLocalTime(that.create_time)+"</span></p></div></a></div>");
                    });

                });
            })
        })
        //Ajax获取小区通知
        $("#getNotice").click(function(){
            ++page;
            $.getJSON("/home/index/noticeAjax.html",{page:page},function(data){
                if(data==""){
                    $("#getNotice").html('没有更多了!')
                }
                $.each(data,function(){
                    var that = this;
                    var cover_id=this.cover_id;
                    $.getJSON("/home/index/getPicture.html",{cover_id:cover_id},function(src){
                        $(".ajaxNotice").append("<div class='row noticeList'><a href='/home/index/serviceDetail?id="+that.id+"'><div class='col-xs-2'><img class='noticeImg' src='"+src.path+"' /></div><div class='col-xs-10'><p class='title'>"+that.title+"</p><p class='intro'>"+that.title+that.title+"</p><p class='info'>浏览次数:"+that.view_times+"<span class='pull-right'>"+getLocalTime(that.create_time)+"</span></p></div></a></div>");
                    });

                });
            })
        });
        //Ajax获取便民服务
        $("#getService").click(function(){
            ++page;
            $.getJSON("/home/index/serviceAjax.html",{page:page},function(data){
                if(data==""){
                    $("#getService").html('没有更多了!')
                }
                $.each(data,function(){
                    var that = this;
                    var cover_id=this.cover_id;
                    $.getJSON("/home/index/getPicture.html",{cover_id:cover_id},function(src){
                        $(".ajaxService").append("<div class='row noticeList'><a href='/home/index/serviceDetail?id="+that.id+"'><div class='col-xs-2'><img class='noticeImg' src='"+src.path+"' /></div><div class='col-xs-10'><p class='title'>"+that.title+"</p><p class='intro'>"+that.title+that.title+"</p><p class='info'>浏览次数:"+that.view_times+"<span class='pull-right'>"+getLocalTime(that.create_time)+"</span></p></div></a></div>");
                    });

                });
            })
        })
    });


</script>
</body>
</html>