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
<link rel="stylesheet" type="text/css" href="/Public/css/index.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/indexAn.css" />
<!-- stance --><div class="stance"></div><!-- stance -->
<!-- banner -->
<div class="banner pc">
    
    <?php if(is_array($banner)): $k = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div class="content content1 <?php if($k == 2): ?>two<?php elseif($k == 3): ?>three<?php endif; ?>" style="background-image:url(<?php echo ($v["imageUrl"]); ?>);"><div class="container">
            <div class="infos">
                <h1><?php echo ($v["title"]); ?></h1>
                
                    <div class="info">
                        <?php echo (html_entity_decode($v["content"])); ?>
                        <?php if($k == 1): ?><span></span><?php endif; ?>
                    </div>
                 

                </if>

            </div>
            <div class="imgs"><img src="/Public/images/index/banner_1.png" alt=""></div>
        </div></div><?php endforeach; endif; else: echo "" ;endif; ?>
	
    <div class="banner-nav"></div>
</div>

<!-- banner over -->
<!-- product -->
<div class="product">
    <div class="list-box">
        <div class="list first box00">
            <div class="arrow"></div>
            <h6>产品推荐</h6>
            <span></span>
            <p>获取更多最新产品系列</p>
            <a href="<?php echo U('Product/index');?>?pid=<?php echo ($first1["product_classify_id"]); ?>" class="more">查看更多</a>     
        </div>
        <?php if(is_array($product)): $k = 0; $__LIST__ = array_slice($product,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><a href="<?php echo U('Product/detail');?>?pid=<?php echo ($v["product_id"]); ?>">        
                <div class="list <?php if($k%3 == 0): ?>nor<?php endif; ?>">
                <div class="imgBox">
                    <img src="<?php echo ($v["imageUrl"]); ?>" alt="" />
                </div>
                <div class="infos">
                    <p><?php echo ($v["title"]); ?></p>
                    <h6><?php echo ($v["type"]); ?></h6>
                </div>
                </div>
            </a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>  
    <div class="list-box m1">

        <?php if(is_array($product)): $k = 0; $__LIST__ = array_slice($product,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><a href="<?php echo U('Product/detail');?>?pid=<?php echo ($v["product_id"]); ?>">        
                <div class="list <?php if($k%3 == 0): ?>nor<?php endif; ?>">
                <div class="imgBox">
                    <img src="<?php echo ($v["imageUrl"]); ?>" alt="" />
                </div>
                <div class="infos">
                    <p><?php echo ($v["title"]); ?></p>
                    <h6><?php echo ($v["type"]); ?></h6>
                </div>
                </div>
            </a><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="list first box11">
            <div class="arrow"></div>
            <h6>产品推荐</h6>
            <span></span>
            <p>获取更多最新产品系列</p>
            <a href="<?php echo U('Product/index');?>?pid=<?php echo ($first1["product_classify_id"]); ?>" class="more">查看更多</a>     
        </div>    
    </div>
    <div class="list-box">

        <?php if(is_array($product)): $k = 0; $__LIST__ = array_slice($product,3,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><a href="<?php echo U('Product/detail');?>?pid=<?php echo ($v["product_id"]); ?>">       
                <div class="list">
                <div class="imgBox">
                    <img src="<?php echo ($v["imageUrl"]); ?>" alt="" />
                </div>
                <div class="infos">
                    <p><?php echo ($v["title"]); ?></p>
                    <h6><?php echo ($v["type"]); ?></h6>
                </div>
                </div>  
            </a><?php endforeach; endif; else: echo "" ;endif; ?> 
        <div class="two">
            <div class="left">
                <h6>SMART HOME</h6>
                <span>智能家居</span>
                <p>彰显主人高雅的生活品味</p>
                <p>让你享受到生活的乐趣</p>
                <a href="<?php echo U('Product/index');?>?pid=<?php echo ($first1["product_classify_id"]); ?>" class="lookMore">READ MORE&gt;</a>
            </div>
            <div class="right">
                <img src="/Public/images/index/product03.png" alt="" />
            </div>
        </div>
    </div>
</div>
<!-- product over-->
<!-- life -->
<div class="life">
    <h6>“APPOLLO阿波罗卫浴”到“Vensi威士丹利智能”</h6>
    <p>我们从未改变--为您创造美好生活的愿望。</p>
</div>
<!-- life over -->
<!-- about -->
<div class="about">
    <div class="left">
        <div class="info">
            <h5>从未改变</h5>
            <p>为您创造美好生活空间</p>
            <a href="<?php echo U('About/brand');?>" class="lookMore">READ MORE&gt;</a>
        </div>
    </div>
    <div class="right">
        <a href="<?php echo U('About/brand');?>">
            <div class="list brand">
                <div class="brand-icon"></div>
                <p class="en">Brand introduction</p>
                <p>品牌介绍</p>
            </div>
        </a>        
        <a href="<?php echo U('About/culture');?>">
            <div class="list culture">
                <div class="culture-icon"></div>
                <p class="en">corporate culture</p>
                <p>企业文化</p>
            </div>
        </a>        
        <a href="<?php echo U('About/honor');?>">
            <div class="list honor">
                <div class="honor-icon"></div>
                <p class="en">Enterprise honor</p>
                <p>企业荣誉</p>
            </div>
        </a>        
        <a href="<?php echo U('About/video');?>">
            <div class="list video">
                <div class="video-icon"></div>
                <p class="en">Glorious course</p>
                <p>光辉历程</p>
            </div>
        </a>
    </div>
</div>
<!-- about over -->
<!-- news-title -->
<div class="news-t">
    <h3>新闻中心</h3>
</div>
<!-- news-title over -->
<!-- news -->
<div class="news">
    <ul>
        <?php if(is_array($news)): $k = 0; $__LIST__ = array_slice($news,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><a href="<?php echo U('News/detail');?>?pid=<?php echo ($v["news_id"]); ?>">        
            <li>
                <div class="imgs fl" style="background-image:url(<?php echo ($v["imageUrl"]); ?>)"></div>
                <div class="infos fr">
                    <div class="arrow"></div>
                    <h6><?php echo ($v["title"]); ?></h6>
                    <p><?php echo ($v["info"]); ?></p>
                    <span class="readMore">READ MORE&gt;</span>
                </div>
            </li>
          </a><?php endforeach; endif; else: echo "" ;endif; ?>
        
        <?php if(is_array($news)): $k = 0; $__LIST__ = array_slice($news,2,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><a href="<?php echo U('News/detail');?>?pid=<?php echo ($v["news_id"]); ?>">
            <li class="nor">
                <div class="imgs fr" style="background-image:url(<?php echo ($v["imageUrl"]); ?>)"></div>
                <div class="infos fl">
                    <div class="arrow"></div>
                    <h6><?php echo ($v["title"]); ?></h6>
                    <p><?php echo ($v["info"]); ?></p>
                    <span class="readMore">READ MORE&gt;</span>
                </div>
            </li> 
            </a><?php endforeach; endif; else: echo "" ;endif; ?>      
        
    </ul>
</div>
<!-- news over-->
<!-- view -->
<div class="view">
    <a href="<?php echo U('News/index');?>?pid=<?php echo ($first["news_classify_id"]); ?>" class="all">VIEW ALL NEWS&gt;</a>
</div>
<!-- view over-->
<!-- shop -->
<div class="shop">
    <ul>
        <li>
            <div class="dotted" onclick="javascript:window.location.href='<?php echo U('Cases/index');?>?pid=<?php echo ($first2["project_classify_id"]); ?>'" style="cursor: pointer;">
                <img src="/Public/images/index/shop.png" class="show" alt="" />
                <img src="/Public/images/index/shop_hover.png" class="hide" alt="" />
            </div>
            <h5> 解决方案</h5>
            <p>智能，让生活更美好！</p>
        </li> 
		
        <li>
            <div class="dotted" onclick="javascript:window.location.href='<?php echo U('Join/index');?>'" style="cursor: pointer;">
                <img src="/Public/images/index/shang.png" class="show" alt="" />
                <img src="/Public/images/index/shang_hover.png" class="hide" alt="" />
            </div>
            <h5>招商加盟</h5>
            <p>阿波罗智能招商加盟政策</p>
        </li>   
		
        <li>
		<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2490913632&site=qq&menu=yes">
				<div class="dotted">
					<img src="/Public/images/index/person.png" class="show" alt="" />
					<img src="/Public/images/index/person_hover.png" class="hide" alt="" />
				</div>
				<h5> 在线客服</h5>
				<p>请与我们的客户服务代表联系</p>
		</a>	
        </li>        
        <li class="nor">
			<a href="<?php echo U('Contact/index');?>">
				<div class="dotted">
					<img src="/Public/images/index/tel.png" class="show" alt="" />
					<img src="/Public/images/index/tel_hover.png" class="hide" alt="" />
				</div>
				<h5> 400-688-4238</h5>
				<p>周一到周日:8:30 - 20:30（全年无休热线）</p>
			</a>
        </li>
    </ul>
</div>
<!-- shop over-->
<!-- link -->
<div class="link">
    <div class="container">
        <ul>
            <li class="title">友情链接</li>
            <?php if(is_array($friend)): $k = 0; $__LIST__ = $friend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><a href="<?php echo ($v["link"]); ?>">
                    <li><?php echo ($v["title"]); ?></li>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
</div>
<!-- link over-->
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
<script src="/Public/js/index.js"></script>