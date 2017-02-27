<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title><?php echo ($base["title"]); ?> | Admin System </title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="/Public/metronic/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/metronic/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/metronic/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/metronic/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/metronic/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/metronic/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/metronic/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="/Public/metronic/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="/Public/uploadiFive/uploadifive.css">
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/Public/metronic/css/select2_metro.css" />
	<link rel="stylesheet" href="/Public/metronic/css/DT_bootstrap.css" />
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="/Public/metronic/image/favicon.ico" />

	<!-- 扩展 -->
	
	<script type="text/javascript" src="/Public/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="/Public/ckfinder/ckfinder.js"></script>

	<script src="/Public/metronic/js/jquery-1.10.1.min.js" type="text/javascript"></script>

	<link href="/Public/uploadify/uploadify.css" rel="stylesheet" type="text/css"/>
	<script src="/Public/uploadify/jquery.uploadify.min.js?ver=<?php echo rand(0,99999);?>" type="text/javascript"></script>

	
	<script src="/Public/admin/base.js" type="text/javascript"></script>
	<script type="text/javascript">
		<?php $timestamp = time();?>
		var timestamp="<?php echo $timestamp ?>";
		var token="<?php echo md5('unique_salt' . $timestamp); ?>";
		var swf='/Public/uploadify/uploadify.swf';
		var uploader='<?php echo U("Admin/Public/uploadImg");?>';
		/*删除设置*/
		setDeSureUrl("<?php echo U('Admin/Public/del');?>");
		/*状态设置*/
		setChangeStatus("<?php echo U('Admin/Public/changeStatus');?>");
		/*局部设置*/
		setChangeValue("<?php echo U('Admin/Public/changeValue');?>");
	</script>
	<!-- 自己样式 -->
	<link href="/Public/admin/cc.css" rel="stylesheet" type="text/css"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- ALERT -->
	<div id="alertModel" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="alertModel" aria-hidden="false" >
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="alertNo()"
			></button>
			<h3 id="myModalLabel3">提示</h3>
		</div>
		<div class="modal-body">
			<p>您确认要删除该信息？</p>
		</div>
		<div class="modal-footer">
			<button class="btn" id="alertNo" data-dismiss="modal" aria-hidden="true" onclick="alertNo()">否</button>
			<button data-dismiss="modal" id="alertSure" class="btn blue">是</button>
		</div>
	</div>
	<!-- ALERT OVER -->
	<!-- MESSAGE -->
	<div id="message-success" style="position:fixed;top:-80px;left:50%;z-index:5;width:50%;margin-left:-25%;" class="alert alert-success">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <h4>成功</h4>
	  修改成功！
	</div>
	<div id="message-error" style="position:fixed;top:-80px;left:50%;z-index:5;width:50%;margin-left:-25%;" class="alert alert-error">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <h4>失败</h4>
	   修改失败！
	</div>

	<div id="pwmessage-error" style="position:fixed;top:-80px;left:50%;z-index:5;width:50%;margin-left:-25%;" class="alert alert-error">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <h4>修改失败</h4>
	  两次输入的密码不一致，请重新输入！
	</div>
	<!-- MESSAGE OVER -->
	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="index.html">
				<img src="/Public/metronic/image/logo.png" alt="logo"/>
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<img src="/Public/metronic/image/menu-toggler.png" alt="" />
				</a>          
				<!-- END RESPONSIVE MENU TOGGLER -->            
				<!-- BEGIN TOP NAVIGATION MENU -->              
				<ul class="nav pull-right">
					<!-- BEGIN USER LOGIN DROPDOWN 头像信息-->
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img alt="" width="29px" height="29px" src="/Public/metronic/image/logo2.png" />
						<span class="username">管理员</span>
						<i class="icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo U('Admin/Admin/index');?>"><i class="icon-user"></i> 我的信息</a></li>
							<li><a href="<?php echo U('Admin/Index/index');?>"><i class="icon-cogs"></i> 系统参数</a></li>
							
							<li><a href="<?php echo U('Admin/Public/del_img');?>"><i class="icon-picture"></i> 清除图片缓存</a></li>
							<li><a href="<?php echo U('Admin/Public/del_cache');?>"><i class="icon-folder-open"></i> 清除系统缓存</a></li>
							<li class="divider"></li>
	
							<li><a href="<?php echo U('Admin/Admin/changePass');?>"><i class="icon-key"></i> 更换密码</a></li>
							<li><a href="<?php echo U('Admin/Admin/clearSession');?>"><i class="icon-share-alt"></i> 注销</a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU --> 
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->

<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU 导航条-->        
			<ul class="page-sidebar-menu">
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li>
					<br />
				</li>

				<li class="<?php if($_SESSION['nav'] == 'index'): ?>active<?php endif; ?>">
					<a href="<?php echo U('Admin/Index/index');?>">
					<i class="icon-cogs"></i> 
					<span class="title">系统参数</span>
					<span class="selected"></span>
					</a>
				</li>
				
				
				<?php if(session('admin_id') == 1): ?><li class="<?php if(strstr($_SESSION['nav'],'admin')): ?>active open<?php endif; ?>">
					<a href="javascript:;">
					<i class="icon-group"></i> 
					<span class="title">管理员管理</span>
					<span class="arrow <?php if(strstr($_SESSION['nav'],'admin')): ?>open<?php endif; ?>"></span>
					</a>
					<ul class="sub-menu">
						<li class="<?php if($_SESSION['nav'] == 'admin'): ?>active<?php endif; ?>">
							<a href="<?php echo U('Admin/Admin/admin');?>">
							人员管理</a>
						</li>
						
					</ul>
				</li>
				
				<li class="<?php if(strstr($_SESSION['nav'],'nav')): ?>active open<?php endif; ?>">
					<a href="javascript:;">
					<i class="icon-sitemap"></i> 
					<span class="title">菜单管理</span>
					<span class="arrow <?php if(strstr($_SESSION['nav'],'nav')): ?>open<?php endif; ?>"></span>
					</a>
					<ul class="sub-menu">
						<li class="<?php if($_SESSION['nav'] == 'nav_left'): ?>active<?php endif; ?>">
							<a href="<?php echo U('Admin/Nav/left');?>">
							后台菜单</a>
						</li>
					
						
					</ul>
				</li><?php endif; ?>


				<?php if(is_array($leftNav)): $i = 0; $__LIST__ = $leftNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $wonderful=explode("_",$_SESSION['nav']); ?>
				<li class="<?php if($wonderful[0] == $vo['name']): ?>active open<?php endif; ?>">
					<a href="javascript:;">
					<i class="<?php echo ($vo['icon']); ?>"></i> 
					<span class="title"><?php echo ($vo['title']); ?></span>
					<span class="arrow <?php if($aaa[0] == $vo['name']): ?>open<?php endif; ?>"></span>
					</a>
					<ul class="sub-menu">
						<?php if(is_array($vo['child'])): $j = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($j % 2 );++$j;?><li class="<?php if($_SESSION['nav'] == $vo1['name']): ?>active<?php endif; ?> <?php if(strstr($_SESSION['nav'],$vo1['name'])): ?>active open<?php endif; ?>">
							<a href="/Admin/<?php echo ($vo1['url']); ?>.html">
							<?php echo ($vo1['title']); ?>
							<?php if($vo1['child']): ?><span class="arrow <?php if(strstr($_SESSION['nav'],$vo1['name'])): ?>open<?php endif; ?>"></span><?php endif; ?>
							</a>

							<?php if($vo1['child']): ?><ul class="sub-menu">
								<?php if(is_array($vo1['child'])): $k = 0; $__LIST__ = $vo1['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k % 2 );++$k;?><li class="<?php if($_SESSION['nav'] == $vo2['name']): ?>active<?php endif; ?>">
									<a href="/Admin/<?php echo ($vo2['url']); ?>.html"><?php echo ($vo2['title']); ?></a>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul><?php endif; ?>

						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
				<!-- <li class="<?php if(strstr($_SESSION['nav'],'banner')): ?>active open<?php endif; ?>">
					<a href="javascript:;">
					<i class="icon-picture"></i> 
					<span class="title">BANNER</span>
					<span class="arrow <?php if(strstr($_SESSION['nav'],'banner')): ?>open<?php endif; ?>"></span>
					</a>
					<ul class="sub-menu">
						<li class="<?php if($_SESSION['nav'] == 'banner_index'): ?>active<?php endif; ?>">
							<a href="<?php echo U('Admin/Banner/index');?>">
							主页BANNER</a>
						</li>
						<li class="<?php if($_SESSION['nav'] == 'banner_other'): ?>active<?php endif; ?>">
							<a href="<?php echo U('Admin/Banner/other');?>">
							业主委托BANNER</a>
						</li>
						
					</ul>
				</li>-->
				
				

			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->	
		<!-- BEGIN PAGE -->
		<div class="page-content">
			
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							<?php echo ($title); ?> <small><?php echo ($base["title"]); ?></small>
						</h3>
						<!-- END PAGE TITLE & BREADCRUMB-->
						<!-- BEGIN DASHBOARD STATS -->
						
						<div class="row-fluid">



							<div class="tab-pane active" >
								<div class="portlet box blue ">
									<div class="portlet-title">
										<div class="caption"><i class="icon-reorder"></i>作品视频<input type="hidden" id="dataid" value="<?php echo ($data["video1_id"]); ?>" /></div>
										<div class="tools">
											<a href="javascript:;" class="collapse"></a>
											
											<a href="javascript:;" class="reload"></a>
											<a href="javascript:;" class="remove"></a>
										</div>
									</div>
									<div class="portlet-body form">
										
										<!-- BEGIN FORM-->
									
										<form action="#" class="form-horizontal form-bordered">
											
											
											

											<h3 class="form-section">CONTENT</h3>
											
											<div class="control-group">
												<label class="control-label">标识</label>
												<div class="controls" style="">
													<div class="span2" style="">
														<label class="checkbox">
														<input type="checkbox" class="status" name="status" value="1"<?php if($data['status'] == 1): ?>checked<?php endif; ?>/>
														是否显示
														</label>
													</div>

													<div class="span2" style="">
														<label class="checkbox">
														<input type="checkbox" class="showindex" name="showindex" value="1" <?php if($data['showindex'] == 1): ?>checked<?php endif; ?> />
														是否推优显示
														</label>
													</div>

												</div>
											</div>
											<div class="control-group">
												<label class="control-label">图片</label>
												<div class="controls">
													
													<img id="imageShow" src="<?php echo ($data["imageUrl"]); ?>" />
													<input type="hidden" id="imageUrl" value="<?php echo ($data["imageUrl"]); ?>" />
														<div id="queue"></div>
														<input id="file_upload" name="file_upload" type="file" multiple="true">
													<span class="help-inline" >图片比例 （380*260）| 推优图片比例 （880*600）</span>
												</div>
											</div>




											<div class="control-group">
												<label class="control-label">视频MP4</label>
												<div class="controls">	
													<input type="hidden" id="avShow" name="avUrl" value="<?php echo ($data["avUrl"]); ?>" />
													<input type="text" id="avUrl"  value="<?php echo ($data["avUrl"]); ?>" />
													
														<div id="queue"></div>
														<input id="av_upload" name="av_upload" type="file" multiple="true">
												</div>
											</div>



											<div class="control-group">
												<label class="control-label">视频WEBM</label>
												<div class="controls">
													
													<input type="hidden" id="avShow1" name="avUrl1" value="<?php echo ($data["avUrl1"]); ?>" />
													<input type="text" id="avUrl1"  value="<?php echo ($data["avUrl1"]); ?>" />
													
														<div id="queue"></div>
														<input id="av_upload1" name="av_upload1" type="file" multiple="true">
													
												</div>
											</div>


											<div class="control-group">
												<label class="control-label">标题</label>
												<div class="controls">
													<input type="text" placeholder="Title" name="title" id="title" class="m-wrap large" value="<?php echo ($data["title"]); ?>">
													<span class="help-inline"></span>
												</div>
											</div>

											<!-- <div class="control-group">
												<label class="control-label">播放次数</label>
												<div class="controls">
													<input type="text" placeholder="播放次数" name="num" id="num" class="m-wrap large" value="<?php echo ($data["num"]); ?>">
													<span class="help-inline"></span>
												</div>
											</div> -->

											<div class="control-group">
												<label class="control-label">发布时间</label>
												<div class="controls">
													<input type="text" placeholder="Show time" name="showtime" id="showtime" class="m-wrap large" value="<?php echo ($data["showtime"]); ?>">
													<span class="help-inline">例如 2016-4-18 不填写则为当前时间</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">优先级</label>
												<div class="controls">
													<input type="text" placeholder="Sort" name="sort" id="sort" class="m-wrap large" value="<?php echo ($data["sort"]); ?>">
													<span class="help-inline">默认为0</span>
												</div>
											</div>

											<!-- <div class="control-group">
												<label class="control-label">简介</label>
												<div class="controls">
													<textarea id="info" class="m-wrap span6" rows="6" ><?php echo ($data["info"]); ?></textarea>
													<span class="help-inline" ></span>
												</div>
											</div>
 -->
										
											
											
											
						
											<div class="form-actions">
												<button type="button" onclick="submitClick()" class="btn blue"><i class="icon-ok"></i>保存</button>
												<button type="button" class="btn" onclick="javascript:window.history.go(-1);">返回</button>
											</div>
										</form>
										<!-- END FORM-->  
									</div>
								</div>
							</div>





							
						</div>
						<!-- END DASHBOARD STATS -->
				</div>
				<!-- END PAGE HEADER-->
			</div>
			<!-- END PAGE CONTAINER-->    
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			Powered by PID Interactive
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	
	<script src="/Public/metronic/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="/Public/metronic/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="/Public/metronic/js/bootstrap.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
	<script src="/Public/metronic/js/excanvas.min.js"></script>
	<script src="/Public/metronic/js/respond.min.js"></script>  
	<![endif]-->   
	<script src="/Public/metronic/js/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="/Public/metronic/js/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="/Public/metronic/js/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="/Public/metronic/js/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="/Public/metronic/js/select2.min.js"></script>
	<script type="text/javascript" src="/Public/metronic/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="/Public/metronic/js/DT_bootstrap.js"></script>
	<script src="/Public/uploadiFive/jquery.uploadifive.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="/Public/metronic/js/app.js"></script>

	<script>
		jQuery(document).ready(function() {    
		   App.init(); // initlayout and core plugins
		});
	</script>
	<!-- END JAVASCRIPTS -->
	<script type="text/javascript">
		$(function(){
			

			var showEle="imageShow";
			var saveEle="imageUrl";
			var ele="file_upload";

			var imageObj=new images(timestamp,token,swf,uploader,showEle,saveEle,ele,"src");
			setTimeout(imageObj.upload(),10);

			var showEle="avShow";
			var saveEle="avUrl";
			var ele="av_upload";

			var imageObj=new images(timestamp,token,swf,uploader,showEle,saveEle,ele,"value");
			setTimeout(imageObj.upload(),10);

			var showEle="avShow1";
			var saveEle="avUrl1";
			var ele="av_upload1";
			
			var imageObjav1=new images(timestamp,token,swf,uploader,showEle,saveEle,ele,"value");
			setTimeout(imageObjav1.upload(),10);

			

			
		});
		

		function submitClick(){
	
			$.post(
				"<?php echo U('Admin/Press/video1_Submit');?>",
				{
					'dataid':$("#dataid").val(),
					'status':$(".checker .checked .status").val(),
					'showindex':$(".checker .checked .showindex").val(),
					'title':$("#title").val(),
					'sort':$("#sort").val(),
					'info':$("#info").val(),
					'num':$("#num").val(),
					'showtime':$("#showtime").val(),
					'imageUrl':$("#imageUrl").val(),
					'avUrl':$("#avUrl").val(),
					'avUrl1':$("#avUrl1").val(),



				},
				function(data){
					if(data==1){
		                success("<?php echo U('Admin/Press/video1');?>");
					}else{
						errorNo();
					}
				}
				
			);
		}
	</script>