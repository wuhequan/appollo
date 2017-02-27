<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

<title><?php if($data["title"]): echo ($data['title']); else: echo ($meta['headtitle']); endif; ?></title>
    <meta name="author" content="<?php if($data["author"]): echo ($data['author']); else: echo ($meta['author']); endif; ?>"/>
    <meta name="copyright" content="<?php if($data["copyright"]): echo ($data['copyright']); else: echo ($meta['copyright']); endif; ?>"/>
    <meta name="description" content="<?php if($data["description"]): echo ($data['description']); else: echo ($meta['description']); endif; ?>"/>
    <meta name="keywords" content="<?php if($data["keywords"]): echo ($data['keywords']); else: echo ($meta['keywords']); endif; ?>">
    <meta name="searchtitle" content="<?php if($data["searchtitle"]): echo ($data['searchtitle']); else: echo ($meta['searchtitle']); endif; ?>"/>
<link rel="stylesheet" type="text/css" href="/Public/css/base.css" />


</head>

<body>
<!-- header -->
<div class="header">
    <div class="wrap">
        <a href="<?php echo U('Index/index');?>"><img class="logo" src="/Public/images/bigLogo.png" /></a>
        <a href="javascript:;" class="mobile"><img src="/Public/images/mobile.png" alt=""/></a>
        <ul class="nav">
            <div class="navTop" ></div>
            <li <?php if(CONTROLLER_NAME == Index): ?>class="on"<?php endif; ?>>
                <a href="<?php echo U('Index/index');?>"><p class="title">首页</p></a>
            </li>
            <!-- 关于我们 -->
            <li <?php if(CONTROLLER_NAME == About): ?>class="on"<?php endif; ?>>
                <a href="<?php echo U('About/brand');?>"><p class="title">关于我们</p></a>
                <div class="child">
                    <div class="info">
                        <div class="left">
                            <div class="h s">
                                <a href="<?php echo U('About/brand');?>">企业简介</a>
                            </div>
                            <div class="h">
                                <a href="<?php echo U('About/culture');?>">
                                企业文化
                                </a>
                            </div>
                            <div class="h">
                                <a href="<?php echo U('About/honor');?>">企业荣誉</a>
                            </div>
                            <div class="h">
                                <a href="<?php echo U('About/info');?>">
                                光辉历程
                                </a>
                            </div>
                            <!-- <div class="h">
                                <a href="<?php echo U('About/video');?>">视频中心</a>
                            </div> -->
                        </div>
                        <div class="right">
                            <div class="imgs00">
                                <img src="/Public/images/index/1.jpg" alt="" />
                            </div>
                            <div class="imgs00">
                                <img src="/Public/images/index/1.jpg" alt="" />
                            </div>
                            <div class="imgs00">
                                <img src="/Public/images/index/1.jpg" alt="" />
                            </div> 
                            <div class="imgs00">
                                <img src="/Public/images/index/1.jpg" alt="" />
                            </div> 
                            <div class="imgs00">
                                <img src="/Public/images/index/1.jpg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!-- 新闻中心 -->
            <li <?php if(CONTROLLER_NAME == News): ?>class="on"<?php endif; ?>>
                <a href="<?php echo U('News/index');?>?pid=<?php echo ($first["news_classify_id"]); ?>"><p class="title">新闻中心</p></a>
                <div class="child">
                    <div class="info">
                        <div class="left">
                            <?php if(is_array($arr)): $k = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div class="h">
                                    <a href="<?php echo U('News/index');?>?pid=<?php echo ($v["news_classify_id"]); ?>">
                                    <?php echo ($v["title"]); ?>
                                    </a>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="h">
                                    <a href="<?php echo U('News/video1');?>">
                                    公司视频
                                    </a>
                                </div>

                        </div>
                        <div class="right">
                            <div class="imgs00">
                                <img src="/Public/images/index/4.jpg" alt="" />
                            </div>
                            <div class="imgs00">
                                <img src="/Public/images/index/4.jpg" alt="" />
                            </div>
                            <div class="imgs00">
                                <img src="/Public/images/index/4.jpg" alt="" />
                            </div> 
                            <div class="imgs00">
                                <img src="/Public/images/index/4.jpg" alt="" />
                            </div> 
                            <div class="imgs00">
                                <img src="/Public/images/index/4.jpg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!-- 产品中心 -->
            <li <?php if(CONTROLLER_NAME == Product): ?>class="on"<?php endif; ?>>
                <a href="<?php echo U('Product/index');?>?pid=<?php echo ($first1["product_classify_id"]); ?>"><p class="title">产品中心</p></a>
                <div class="child big">
                    <div class="info">
                        <?php if(is_array($arr1)): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dl>
                            <a href="<?php echo U('Product/index');?>?pid=<?php echo ($v["product_classify_id"]); ?>"><dt><?php echo ($v["title"]); ?></dt></a>
                            <?php if(is_array($arr1_child)): $i = 0; $__LIST__ = $arr1_child;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i; if($v['product_classify_id'] == $vv[pid]): ?><dd><a href="<?php echo U('Product/index');?>?pids=<?php echo ($vv["product_classify_id"]); ?>"><?php echo ($vv["title"]); ?></a></dd><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </li>
            <!-- 解决方案 -->
            <li <?php if(CONTROLLER_NAME == Experience): ?>class="on"<?php endif; ?>>
                <a href="<?php echo U('Experience/index');?>"><p class="title">体验与创新</p></a>
                <div class="child">
                    <div class="info">
                        <div class="left">
                            <div class="h">
                                <a href="<?php echo U('Experience/index');?>">
                                产品体验
                                </a>
                            </div>
                            <div class="h">
                                <a href="<?php echo U('Experience/video');?>">
                                技术体验
                                </a>
                            </div>
                        </div>
                        <div class="right">
                            <div class="imgs00">
                                <img src="/Public/images/index/5.jpg" alt="" />
                            </div>
                            <div class="imgs00">
                                <img src="/Public/images/index/5.jpg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li <?php if(CONTROLLER_NAME == Cases): ?>class="on"<?php endif; ?>>
                <a href="<?php echo U('Cases/index');?>?pid=<?php echo ($first2["project_classify_id"]); ?>"><p class="title">成功案例</p></a>
            </li>
            <!-- 招商加盟 -->
            <li <?php if(CONTROLLER_NAME == Join): ?>class="on"<?php endif; ?>>
                <a href="<?php echo U('Join/index');?>"><p class="title">招商加盟</p></a>
               <!--  <div class="child">
                    <div class="info">
                        <div class="left">
                            <div class="h s">
                                <a href="">品牌介绍</a>
                            </div>
                            <div class="h">
                                <a href="">
                                企业文化
                                </a>
                            </div>
                            <div class="h">
                                <a href="">品牌介绍</a>
                            </div>
                            <div class="h">
                                <a href="">
                                企业文化
                                </a>
                            </div>
                            <div class="h">
                                <a href="">品牌介绍</a>
                            </div>
                        </div>
                        <div class="right">
                            <div class="imgs00">
                                <img src="/Public/images/index/3.jpg" alt="" />
                            </div>
                            <div class="imgs00">
                                <img src="/Public/images/index/4.jpg" alt="" />
                            </div>
                            <div class="imgs00">
                                <img src="/Public/images/index/2.jpg" alt="" />
                            </div> 
                            <div class="imgs00">
                                <img src="/Public/images/index/1.jpg" alt="" />
                            </div> 
                            <div class="imgs00">
                                <img src="/Public/images/index/2.jpg" alt="" />
                            </div>
                        </div>
                    </div>
                </div> -->
            </li>
            <li class="no" <?php if(CONTROLLER_NAME == Contact): ?>class="on"<?php endif; ?>>
                <a href="<?php echo U('Contact/index');?>"><p class="title">联系我们</p></a>
            </li>
        </ul>
		<div class="scroll_box" id="cate00">
			<div class="nav_list">
				<div class="mobile-nav">
					<dl>
					<a href="<?php echo U('Index/index');?>"><dt>首页 </dt></a>
				</dl>            
				<dl>
					<dt>关于我们 </dt>
					<div class="y">
						<dd><a href="<?php echo U('About/brand');?>">品牌介绍</a></dd>
						<dd><a href="<?php echo U('About/culture');?>">企业文化</a></dd>
						<dd><a href="<?php echo U('About/honor');?>">企业荣誉</a></dd>
						<dd><a href="<?php echo U('About/info');?>">光辉历程</a></dd>
						<dd><a href="<?php echo U('About/video');?>">视频中心</a></dd>
					</div>
				</dl>            
				<dl>
					<dt>新闻中心  </dt>
					<div class="y">
						<?php if(is_array($arr)): $k = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><dd><a href="<?php echo U('News/index');?>?pid=<?php echo ($v["news_classify_id"]); ?>"><?php echo ($v["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</dl>            
				<dl>
					<dt>产品中心 </dt>
					<div class="y">
						<?php if(is_array($arr1)): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd class="mm">
								<a href="<?php echo U('Product/index');?>?pid=<?php echo ($v["product_classify_id"]); ?>" class="m0"><?php echo ($v["title"]); ?></a>
								<div class="list cate">
									<div class="list_box">
										<?php if(is_array($arr1_child)): $i = 0; $__LIST__ = $arr1_child;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i; if($v['product_classify_id'] == $vv[pid]): ?><a href="<?php echo U('Product/index');?>?pids=<?php echo ($vv["product_classify_id"]); ?>" class="list-c"><?php echo ($vv["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
									</div>
								</div>
							</dd><?php endforeach; endif; else: echo "" ;endif; ?>    
					</div>
				</dl>
                <dl>
                    <dt>体验与创新 </dt>
                    <div class="y">
                        <dd><a href="<?php echo U('Experience/index');?>">产品体验</a></dd>
                        <dd><a href="<?php echo U('Experience/video');?>">技术体验</a></dd>
                        
                    </div>
                </dl>            
				<dl>
					<dt>成功案例</dt>
					<div class="y">
						<?php if(is_array($arr2)): $k = 0; $__LIST__ = $arr2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><dd><a href="<?php echo U('Cases/index');?>?pid=<?php echo ($v["project_classify_id"]); ?>"><?php echo ($v["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</dl>            
				<dl>
					<a href="<?php echo U('Join/index');?>"><dt>招商加盟 </dt></a>
				</dl>            
				<dl>
					<a href="<?php echo U('Contact/index');?>"><dt>联系我们 </dt></a>
				</dl>
				<div class="customer small">  
					<div class="child cn">简体中文
						<div class="show">
							<p>English</p>
							<p>Other</p>                    
							<p>English</p>
							<p>Other</p>
						</div>
					</div>
					<!-- <div class="shop child">商城</div> -->
					<a href="<?php echo U('Vip/information');?>"><div class="child kehu nor">VIP专区</div></a>
				</div>
				</div>
			</div>
		</div>
        <div class="customer">  
            <div class="child cn">简体中文
                <div class="show">
                    <p>English</p>
                </div>
            </div>
            <!-- <div class="shop child">商城</div> -->
           <a href="<?php echo U('Vip/information');?>"><div class="child kehu nor">VIP专区</div></a>
        </div>
    </div>
</div>
<!-- header over -->
<link rel="stylesheet" type="text/css" href="/Public/css/porduct-details.css" />

<!-- stance -->
<div class="stance"></div>
<!-- stance -->
<!-- main -->
<div class="main">
    <div class="container">
        <div class="banner06">
            <div class="box">
                <ul>
                    <?php if(is_array($data["maxUrl"])): $i = 0; $__LIST__ = $data["maxUrl"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li style="background-image:url(<?php echo ($v); ?>)">
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            </div>
            <div class="title-big">
            <div class="show"></div>
            <div class="left11 ts">
                </div>
                <div class="right11 ts"></div>
            </div>
        </div>
        <div class="banner">
            <?php if(is_array($data["maxUrl"])): $i = 0; $__LIST__ = $data["maxUrl"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="content">
                    <div class="container">
                        <img src="<?php echo ($v); ?>" alt="" />
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>          
            
            <div class="max-container">
                <div class="btn left" onclick="banner.todo({'direc':'-'})"></div>
                <div class="btn right"onclick="banner.todo({'direc':'+'})"></div>
            </div>
        </div>
        <div class="info">
            <h4><?php echo ($data["title"]); ?></h4>
            <span><?php echo ($data["title1"]); ?></span>
			<div class="show"><div class="p_box"><?php echo (html_entity_decode($data["content"])); ?></div></div>
        </div>
    </div>
</div>
<!-- main over -->
<!-- parameter -->
<div class="parameter">
    <div class="container">
        <h4>产品参数</h4>
        <span class="link"></span>
        <ul>
            <li>
                <?php if($data["title"] != '' ): ?><p><em>型号：</em><span><?php echo ($data["title"]); ?></span></p><?php endif; ?>
                <?php if($data["power"] != '' ): ?><p><em>功耗：</em><span><?php echo ($data["power"]); ?></span></p><?php endif; ?>
                <?php if($data["norms"] != '' ): ?><p><em>规格：</em><span><?php echo ($data["norms"]); ?></span></p><?php endif; ?>
            </li>            
            <li>
                <?php if($data["source"] != '' ): ?><p><em>电源：</em><span><?php echo ($data["source"]); ?></span></p><?php endif; ?>
                <?php if($data["electricize"] != '' ): ?><p><em>充电方式：</em><span><?php echo ($data["electricize"]); ?></span></p><?php endif; ?>
                <?php if($data["networking"] != '' ): ?><p><em>组网方式：</em><span><?php echo ($data["networking"]); ?></span></p><?php endif; ?>
            </li>            
            <li>
                <?php if($data["color"] != '' ): ?><p><em>颜色：</em><span><?php echo ($data["color"]); ?></span></p><?php endif; ?>
            </li>
        </ul>
    </div>
</div>
<!-- parameter over -->
<!-- imgs -->
<?php if(!empty($data["maxUrl1"])): ?><div class="imgs">
    <div class="container">
        <?php if(is_array($data["maxUrl1"])): $k = 0; $__LIST__ = $data["maxUrl1"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><p><img src="<?php echo ($v); ?>" alt="" /></p><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div><?php endif; ?>
<!-- imgs over -->
<!-- banner -->
<h3 class="title00">探索其它案例</h3>
<span class="link"></span>
<div class="bigBanner01">
    <div class="banner01">
        <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="content01">
                 <div class="container01">
                    <?php if(is_array($v)): $k = 0; $__LIST__ = $v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($k % 2 );++$k;?><a href="<?php echo U('Product/detail');?>?pid=<?php echo ($vv["product_id"]); ?>">  
                            <div class="cont <?php if($k%4 == 0): ?>nor<?php endif; ?>">
                                 <div class="imgBox">
                                     <img src="<?php echo ($vv["imageUrl"]); ?>" alt="" />
                                 </div>
                                 <div class="info">
                                     <h5><?php echo ($vv["title1"]); ?></h5>
                                     <p><?php echo ($vv["title"]); ?></p>
                                 </div>
                            </div>
                        </a><?php endforeach; endif; else: echo "" ;endif; ?>  
                 </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>             
        <div class="max-container01">
            <div class="btn01 left-btn01" onclick="banner01.todo({'direc':'-'})"></div>
            <div class="btn01 right-btn01" onclick="banner01.todo({'direc':'+'})"></div>
        </div>
    </div>
</div>
<!-- banner over --> 
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="left">
                <div class="footer-logo">
                    <img src="/Public/images/footer.png" alt="" />
                </div>
                <div class="erweima">
                    <img style="width: 110px;height: 110px;" src="/Public/images/erweima01.png" alt="" />
                    <p>微信公众号</p>
                </div>                
                <div class="erweima">
                     <img style="width: 110px;height: 110px;" src="/Public/images/erweima02.png" alt="" />
                    <p>智能app下载</p>
                </div>
            </div>
            <div class="right">
                <ul>
                    <li>
                        <a href="<?php echo U('Job/index');?>">人才招聘</a>
                    </li>
                    <li>
                        <a href="<?php echo U('About/brand');?>">关于我们</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Contact/index');?>">联系我们</a>
                    </li>
                    <li class="nor">
                        <a href="<?php echo U('Index/sitemap');?>">网站地图</a>
                    </li>
                </ul>
                <p class="tel">020-28397149</p>
                <p class="area">广州市黄埔区永和经济区黄旗山路19号</p>
                <p class="mail">vensi@vensi.cn</p>
            </div>
        </div>
        <div class="copy">
            <p>粤ICP备16024599号 copyright2010 广州市阿波罗智能科技有限公司 版权所有  <a style="color: #fff" href="http://www.pidcn.com/" target="__blank">Powered by PID Interactive</a></p>
            <div class="share">
                <div class="bdsharebuttonbox">
                <a href="#" class="bds_weixin btn" id="weixin" data-cmd="weixin" title="分享到微信"></a>
                <a href="#" class="bds_tsina btn" id="weibo" data-cmd="tsina" title="分享到新浪微博"></a>
                <a href="#" class="bds_renren btn" data-cmd="renren" title="分享到人人网" id="renren"></a>
                <a href="#" class="bds_tqf btn" id="pengyou" data-cmd="tqf" title="分享到腾讯朋友"></a></div>
            </div>
        </div>
    </div>
</div>
<!-- footer over -->
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/base.js"></script>
<script src="/Public/js/dydong.change.js"></script>
<script src="/Public/js/keepScroll.js"></script>
<script src="/Public/js/logo.js"></script>
</body>
</html>

<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<script src="/Public/js/keepScroll.js"></script>
<script src="/Public/js/nav.js"></script>
<script src="/Public/js/show.js"></script>
<script src="/Public/js/case.js"></script>
<script src="/Public/js/series02.js"></script><script type="text/javascript">
$(function(){
    function s(e){
        $(e).children().slideToggle(400)
    };
    $('.header .customer .child').click(function(event) {
        var i = $(this);
        s(i)
    });
    $('.header .mobile').click(function(event) {
        $('.nav').toggleClass('show');
    });
	var bl = true;
	$('.main .info .lookMore').click(function(){
		if(bl==true){
			$(this).parent().parent().addClass('current');
			$(this).html("收起");
			bl=false;
		}else{
			$(this).parent().parent().removeClass('current');
			bl =true;
			$(this).html("查看更多");
		}
	});
	var boxH = $('.main .info .show .p_box').height();
	if(boxH<200){
		$('.main .info .show').css({"height":"auto","overflow":"hidden"})
	}
})
</script>
erflow":"hidden"})
	}
})
</script>