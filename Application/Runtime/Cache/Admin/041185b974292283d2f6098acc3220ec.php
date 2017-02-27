<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>威士丹利 | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="/Public/metronic/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/metronic/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/metronic/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/metronic/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/metronic/css/style.css" rel="stylesheet" type="text/css"/>
	
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="/Public/metronic/css/login.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="/Public/image/favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
	<div style="position:absolute;top:50%;left:50%;margin-left:-550px;margin-top:-200px;width:1100px;height:400px;background:url('/Public/metronic/image/bg_index.gif') no-repeat center center;">
	<!-- BEGIN LOGIN -->
	<div class="content" style="position: absolute;top: 140px;left: 380px;">
		<!-- BEGIN LOGIN FORM -->
			
			<div class="control-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">用户名</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-user"></i>
						<input class="m-wrap placeholder-no-fix" type="text" id="username" placeholder="用户名" name="username"/>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">密码</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
						<input class="m-wrap placeholder-no-fix" type="password" id="password" placeholder="密码" name="password"/>
					</div>
				</div>
			</div>
			<div class="control-group">
				<button type="submit" onclick="loginSub()" class="btn red pull-right">
				登陆 <i class="m-icon-swapright m-icon-white"></i>
				</button>     
			</div>
			<div class="control-group control-group1">
			</div>
			
		<!-- END LOGIN FORM -->        
	</div>
	<!-- END LOGIN -->

	</div>
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<script src="/Public/metronic/js/jquery-1.10.1.min.js" type="text/javascript"></script>

	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="/Public/metronic/js/app.js" type="text/javascript"></script>
	<script src="/Public/metronic/js/login.js" type="text/javascript"></script>      
	<!-- END PAGE LEVEL SCRIPTS --> 
	<script type="text/javascript">
		function loginSub(){
		    $.ajax({
		        cache: true,
		        type: "POST",
		        url:'<?php echo U('Admin/Index/login');?>',
		        data:"username="+$("#username").val()+
		            "&password="+$("#password").val(),
		        async: false,
		        error: function(request) {
		            alert("Connection error");
		        },
		        success: function(data) {
		            if(data==1){
		                window.location.reload();
		            }else if(data==0){
		               	$(".control-group1").append('<div class="alert passwdError" style="position: absolute;top: 120px;left: 10px;" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>失败!</strong><br><font>账号或密码错误，请重新输入</font></div>');
		               	$(".passwdError").delay(500).fadeOut(500);
		                
		            }else if(data==2){
		            	$(".control-group1").append('<div class="alert againError" style="position: absolute;top: 120px;left: 10px;" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>失败!</strong><br><font>错误次数过多，请十分钟后再次登录！</font></div>');
		            	$(".againError").delay(500).fadeOut(500);
		            }else{
		            	window.location.reload();
		            }
		        }
		    });
		}

		 document.onkeydown=function(event){
            var e = event || window.event || arguments.callee.caller.arguments[0];     
            if(e && e.keyCode==13){ 
            	loginSub();
            }
        }; 
	</script>
</body>
<!-- END BODY -->
</html>