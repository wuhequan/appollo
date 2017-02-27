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
<link rel="stylesheet" type="text/css" href="/Public/css/case.css" />


<!-- stance --><div class="stance"></div><!-- stance -->
<!-- banner  -->
<div class="banner" style="background-image:url(<?php echo ($banner['imageUrl']); ?>)">
    <div class="container">
        <h6><?php echo ($banner["title"]); ?></h6>
        <p><?php echo (html_entity_decode($banner["content"])); ?></p>
    </div>
</div>
<!-- banner over -->
<!-- nav -->
<div class="nav-box">
    <div class="two-nav">
       
        <?php if(is_array($classify)): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="content">
                <div class="container">
                    <?php if(is_array($v)): $i = 0; $__LIST__ = $v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Cases/index');?>?pid=<?php echo ($vv["project_classify_id"]); ?>"><div class="child <?php if($_GET['pid']== $vv[project_classify_id]): ?>in<?php endif; ?>"><div class="span_txt"><?php echo ($vv["title"]); ?></div></div></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>

        <div class="max-container">
            <div class="btn left-btn" onclick="banner01.todo({'direc':'-'})">
                <img src="/Public/images/new/left.png" alt="" />
            </div>
            <div class="btn right-btn" onclick="banner01.todo({'direc':'+'})">
                <img src="/Public/images/new/right.png" alt="" />
            </div>
        </div>
    </div>
</div>
<!-- nav over -->
<!-- main -->
<div class="main">
    <ul>
        <div id="list">   
            <?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li <?php if($k%3 == 0): ?>class="nor"<?php endif; ?>>
                    <div class="imgs">
                        <a href="<?php echo U('Cases/detail');?>?pid=<?php echo ($v["project_id"]); ?>"><img src="<?php echo ($v["imageUrl"]); ?>" alt="" /></a>
                    </div>
                    <div class="info">
                        <div class="info-bd">
                            <a href="<?php echo U('Cases/detail');?>?pid=<?php echo ($v["project_id"]); ?>"><h5><?php echo ($v["title"]); ?></h5></a>
                        </div>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </ul>
	<div class="lookMore">查看更多</div>
</div>
<!-- mian over -->
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
<script src="/Public/js/nav01.js"></script>
<script src="/Public/js/news.js"></script>

<script type="text/javascript">
function GetQueryString(name)
{
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;
}
var pid=GetQueryString("pid");


var su = 0;

		$('.lookMore').click(function(){
         $.get("<?php echo U('Cases/news_sub');?>",{su:su,pid:pid},function(data){


                    var html="";
                    if(data==1)
                    {
                        
                         $('.lookMore').html('无更多方案'); 
                        return;
                    }
                    for(var i in data) 
                    {
                       if ((i+1)%3 == 0) {html+='<li class="nor">'}else{html+='<li>'}
                       html+='<div class="imgs"><a href="<?php echo U('Case/detail');?>?pid='+data[i].project_id+'"><img src="'+data[i].imageUrl+'" alt="" /></a></div>';
                       html+='<div class="info"><div class="info-bd"><a href="<?php echo U('Case/detail');?>?pid='+data[i].project_id+'">';
                       html+='<h5>'+data[i].title+'</h5></a></div></div></li>';
                    }

                    $("#list").append(html);
                 
                });
            su =su+1;
            
     });

</script>