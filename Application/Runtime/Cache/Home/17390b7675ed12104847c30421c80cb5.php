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
<link rel="stylesheet" type="text/css" href="/Public/css/base.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/join01.css" />

<!-- stance --><div class="stance"></div><!-- stance -->
<!-- banner -->
<div class="banner" style="background-image:url(<?php echo ($banner['imageUrl']); ?>)">
    <div class="info">
        <h5>欢迎您</h5>
        <p>加入我们的精英团队</p>
        <p>一起走入亿万智能家居大蓝海</p>
    </div>
</div>
<!-- banner over -->
<!-- enterprise -->
<div class="enterprise">
    <div class="container">
        <h5>企业介绍</h5>
        <p class="title">ENTERPRLSE INTPODUCTION</p>
        <p>
            <img src="/Public/images/join/imgs01.jpg" alt="" />
        </p>
        <div class="txt">
            <p>“<span><img src="/Public/images/join/logo.jpg" alt="" class="logo11"/></span>威士丹利”，是阿波罗集团旗下品牌。</p>
            <p class="m">广州市阿波罗智能科技有限公司传承20年历史的</p>
            <p class="m">阿波罗品牌精神 —— 追求卓越的工匠精神与科技创新团队。</p>
        </div>
        <div class="info">
            <div class="left">
                <p>20年工匠精神智能酒店创导者</p>
                <p>二十年前，</p>
                <p>我们研发生产出酒店客房控制系统</p>
                <p>先后被广州白天鹅酒店等国内几千</p>
                <p>家高级宾馆酒店采用</p>
            </div>
            <div class="left_m">
                <p>广州市阿波罗智能科技有限公司传承20年历史的阿波罗品牌精神 —— 追求卓越的工匠精神与科技创新团队。20年工匠精神智能酒店创导者二十年前，我们研发生产出酒店客房控制系统先后被广州白天鹅酒店等国内几千家高级宾馆酒店采用</p>
            </div>
            <div class="imgs">
                <img src="/Public/images/join/imgs02.jpg" alt="" />
            </div>
        </div>
        <div class="scene">
            <h4><span><img src="/Public/images/join/logo.jpg" alt="" class="logo11"/></span>威士丹利智能家居展会现场</h4>
            <ul>
                <li>
                    <div class="title01">
                    <div class="bg"></div>
                        <em>2016年6月上海展会</em>
                    </div>
                    <img src="/Public/images/join/li01.jpg" alt="" />
                </li>
                <li>
                    <div class="title01 title02">
                    <div class="bg"></div>
                       <em> 2016年7月上海展会</em>
                    </div>
                    <img src="/Public/images/join/li02.jpg" alt="" />
                </li><li>
                    <div class="title01 title03">
                        <div class="bg"></div>
                        <em>2016年8月广州展会</em>
                    </div>
                    <img src="/Public/images/join/li03.jpg" alt="" />
                </li>
                <li>
                    <div class="title01 title04">
                    <div class="bg"></div>
                        <em>2016年9月上海展会</em>
                    </div>
                    <img src="/Public/images/join/li041.jpg" alt="" />
                </li>
            </ul>
        </div>
        <div class="scene">
            <h4><span><img src="/Public/images/join/logo.jpg" alt="" class="logo11"/></span>威士丹利加盟商·合伙人招募会火爆现场</h4>
            <ul>
                <li>
                    <div class="title01">
                    <div class="bg"></div>
                        <em>2016年7月招商会</em>
                    </div>
                    <img src="/Public/images/join/li05.jpg" alt="" />
                </li>
                <li>
                    <div class="title01">
                    <div class="bg"></div>
                       <em> 客户参观智能体验间</em>
                    </div>
                    <img src="/Public/images/join/li06.jpg" alt="" />
                </li><li>
                    <div class="title01">
                        <span><img src="/Public/images/v.png" alt="" class="logo11"/><div class="bg"></div>
                        <em>品牌发布会现场</em>
                    </div>
                    <img src="/Public/images/join/li07.jpg" alt="" />
                </li>
                <li>
                    <div class="title01">
                    <span><img src="/Public/images/v.png" alt="" class="logo11"/><div class="bg"></div>
                        <em>签约仪式</em>
                    </div>
                    <img src="/Public/images/join/li08.jpg" alt="" />
                </li>
            </ul>
            <div class="banner01">
                <div class="content01" style="background-image:url(/Public/images/join/imgs03.jpg);"></div>
                <div class="content01" style="background-image:url(/Public/images/join/imgs03.jpg);"></div>
                <div class="content01" style="background-image:url(/Public/images/join/imgs03.jpg);"></div>
                <div class="max-container">
                    <div class="btn prev" onclick="banner01.todo({'direc':'-'})">
                        <img src="/Public/images/new/left.png" alt="">
                    </div>
                    <div class="btn next" onclick="banner01.todo({'direc':'+'})">
                        <img src="/Public/images/new/right.png" alt="">
                    </div>
                </div>
            </div>
            <p class="pc">"互联网+”的机会   —— 智能生活</p>
            <p class="pc">智能家居是未来的流量入口，是十三五规划中的七大战略新兴产业之一，</p>
            <p class="pc">是引领中国经济华丽转身的主要力量。</p>
            <p class="mobile">"互联网+”的机会   —— 智能生活智能家居是未来的流量入口，是十三五规划中的七大战略新兴产业之一，是引领中国经济华丽转身的主要力量。</p>
        </div>
    </div>
</div>
<!-- enterprise over -->
<!-- brand -->
<div class="brand">
    <div class="container">
        <h5>品牌优势</h5>
        <p class="t">THE ADVANTAGE</p>
    </div>
</div>
<!-- brand over -->
<!-- core -->
<div class="core">
    <div class="container">
        <h5><span>10</span>大核心竞争力</h5>
        <ul>
            <li>
                <div class="number">01</div>
                <div class="txt">
                    <p>传承20年的阿波罗品牌历史</p>
                </div>
            </li>
            <li>
                <div class="number">02</div>
                <div class="txt">
                    <p>追求卓越的工匠精神+互联网创新</p>
                </div>
            </li>
            <li>
                <div class="number">03</div>
                <div class="txt">
                    <p>高度智能化的体验中心系统</p>
                </div>
            </li>
            <li>
                <div class="number">04</div>
                <div class="txt">
                    <p>顶级的研发设计团队</p>
                </div>
            </li>
            <li>
                <div class="number">05</div>
                <div class="txt">
                    <p>强大云平台大数据系统</p>
                </div>
            </li>
            <li>
                <div class="number">06</div>
                <div class="txt">
                    <p>前瞻的市场布局及至尊服务</p>
                </div>
            </li>
            <li>
                <div class="number">07</div>
                <div class="txt">
                    <p>丰富时尚的智能产品族</p>
                </div>
            </li>            
            <li>
                <div class="number">08</div>
                <div class="txt">
                    <p>Zigbee/433/ WIFI/4G全网互联互通</p>
                </div>
            </li>
            <li>
                <div class="number">09</div>
                <div class="txt">
                    <p>强大的合伙人子公司战略体系</p>
                </div>
            </li>
            <li>
                <div class="number">10</div>
                <div class="txt">
                    <p>多种盈利模式助推高额利润回报</p>
                </div>
            </li>
        </ul>
        <h5 class="line"><span>10</span>大加盟支持</h5>
        <p><img src="/Public/images/join/10.png" alt="" /></p>
    </div>
</div>
<!-- core over -->
<!--pattern -->
<div class="pattern">   
    <div class="container">
        <ul>
            <li class="one">
                <div style="width:100%"><h5>我们的赢利模式</h5></div>
                <img src="/Public/images/join/11.png" alt="" />
            </li>
            <li class="two">
                <img src="/Public/images/join/12.png" alt="" />
            </li>
        </ul>
    </div>
</div>
<!-- pattern over -->
<!-- product -->
<div class="product">
    <div class="container">
        <h6>全面的智能产品</h6>
        <p>以Zigbee为核心，433、485、wifi为辅助协议的产品方案</p>
        <ul>
            <li class="big">
                <img src="/Public/images/join/p01.jpg" alt="" />
            </li>
            <li class="nor no">
                <img src="/Public/images/join/p02.jpg" alt="" />
            </li>
            <li>
                <img src="/Public/images/join/p05.jpg" alt="" />
            </li>
            <li class="nor">
                <img src="/Public/images/join/p06.jpg" alt="" />
            </li>
            <li>
                <img src="/Public/images/join/p07.jpg" alt="" />
            </li>
            <li class="nor">
                <img src="/Public/images/join/p08.jpg"  alt="" />
            </li>
        </ul>
    </div>
</div>
<!-- product over -->
<!-- Success -->
<div class="success">
    <div class="container">
        <h5>成功的运营经验</h5>
        <p>上千家品牌专卖店运营经验，帮助投资者建立家装、工程、小区网络、酒店、物业等多方面立体渠道</p>
        <br />
        <p style="width:100%;max-width:100%;">
            <img src="/Public/images/join/imgs04.jpg"  alt="" />
        </p>
    </div>
</div>
<!-- success over -->
<!-- Success -->
<div class="success">
    <div class="container">
        <h5>丰富的渠道资源</h5>
        <p>企业投入巨大人力、物力、财力、气力打造家装、酒店、住宅、物业平台，资源全方位共享</p>
        <!-- banner -->
                <div class="banner04">
                    <div class="btn">
                        <div class="left00 btns01">
                            <img src="/Public/images/new/left.png" alt="" />
                        </div>
                        <div class="right00 btns01">
                            <img src="/Public/images/new/right.png" alt="" />
                        </div>
                    </div>
                    <div class="big">
                        <ul>
                            <li>
                                <p>
                                    <a href=""><img src="/Public/images/join/s01.jpg" alt="" /></a>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href=""><img src="/Public/images/join/s02.jpg" alt="" /></a>
                                </p>
                            </li> 
                            <li>
                                <p>
                                    <a href=""><img src="/Public/images/join/s03.jpg" alt="" /></a>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href=""><img src="/Public/images/join/s01.jpg" alt="" /></a>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href=""><img src="/Public/images/join/s02.jpg" alt="" /></a>
                                </p>
                            </li> 
                            <li>
                                <p>
                                    <a href=""><img src="/Public/images/join/s03.jpg" alt="" /></a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- banner over --> 
    </div>
</div>
<!-- success over -->
<!-- detail -->
<div class="detail" style="text-align:center;padding-bottom:20px;">
    <div class="container">
       <?php echo (html_entity_decode($join["content"])); ?>
    </div>
</div>
<!-- detail -->
<!-- Advertising -->
<div class="advertising">
    <div class="container">
        <h4>广告媒体</h4>
        <ul>
            <li>
                <img src="/Public/images/join/a01.jpg" alt="" />
            </li>
            <li>
                <img src="/Public/images/join/a02.jpg" alt="" />
            </li>
            <li>
                <img src="/Public/images/join/a03.jpg" alt="" />
            </li>
            <li>
                <img src="/Public/images/join/a04.jpg" alt="" />
            </li>
            <li>
                <img src="/Public/images/join/a05.jpg" alt="" />
            </li>
            <li class="nor">
                <img src="/Public/images/join/a05.png" alt="" />
            </li>
            <li>
                <img src="/Public/images/join/a06.jpg" alt="" />
            </li>
            <li>
                <img src="/Public/images/join/a07.jpg" alt="" />
            </li>
            <li>
                <img src="/Public/images/join/a08.jpg" alt="" style="margin-top: -12px;"/>
            </li>
            <li>
                <img src="/Public/images/join/a09.jpg" alt="" />
            </li>
            <li>
                <img src="/Public/images/join/a10.jpg" alt="" />
            </li>
            <li class="nor">
                <img src="/Public/images/join/a11.jpg" alt="" />
            </li>
        </ul>
    </div>
</div>

<!-- Advertising over -->
<!-- process -->
<div class="process">
    <h4>加盟流程</h4>
    <span></span>
    <div class="line"></div>

    <ul>
        <li>
            <p>加盟申请</p>
            <div class="dotted">
                <div class="s">1</div>
            </div>
        </li>
        <li>
            <div class="dotted">
                <div class="s">2</div>
            </div>
            <p class="b">审核资质</p>
        </li>
        <li>
            <p>参观洽谈</p>
            <div class="dotted">
                <div class="s">3</div>
            </div>
        </li>
        <li>
            <div class="dotted">
                <div class="s">4</div>
            </div>
            <p class="b">签订合同</p>
        </li>
        <li>
            <p>店面选址</p>
            <div class="dotted">
                <div class="s">5</div>
            </div>
        </li>
        <li>
            <div class="dotted">
                <div class="s">6</div>
            </div>
            <p class="b">开业支持</p>
        </li>
        <li class="nor">
            <p>后续经营</p>
            <div class="dotted">
                <div class="s">7</div>
            </div>
        </li>
    </ul>
</div>
<!-- process over -->
<!-- hotline -->
<div class="hotline">
    <div class="container">
        <p class="top">
            <img src="/Public/images/join/rexian.png" alt="" />
        </p>
        <p>
            <img src="/Public/images/join/dizhi.png" alt="" />
        </p>
    </div>
</div>
<!-- hotline over -->
<!-- join -->
<div class="join" style="background-image:url(/Public/images/join/join-bg.png);">
    <div class="container">
        <h4>在线加盟</h4>
        <p>感谢您来到威士丹利招商网站，若您有合作意向，请您填写下列表格在线申请或电话联系我们，</p>
        <p>我们将尽快给你回复，并为您提供最真诚的服务，谢谢！</p>
        <form id="commentForm">
            <div class="baseW">
                <input type="text" placeholder="姓名：" class="name"  name="user_name" />
            </div>            
            <div class="baseW">
                <input type="text" placeholder="电话：" class="tel" name="phone" />
            </div>            
            <div class="baseW nor">
                <input type="text" placeholder="地址：" class="area" name="address" />
            </div>
            <textarea id="content" cols="30" rows="10" name="content" placeholder="内容："></textarea>
            <button>提交</button>
        </form>
    </div>
</div>
<!-- join over -->
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
<script src="/Public/js/nav.js"></script>
<script src="/Public/js/show.js"></script>
<script src="/Public/js/series03.js"></script>
<script type="text/javascript">


    $('form').submit(function(){

            var data=$(this).serialize();
            $.post('<?php echo U("Join/doform");?>',data,function(data){
                if(data==0){
                  alert('回访失败');
                }
                if(data==2){
                  alert('请输入姓名');
                }
               
                if(data==4){
                  alert('请输入联系方式');
                }
                if(data==5){
                  alert('请输入地址');
                }
                if(data==6){
                  alert('请输入内容');
                }
                if(data==1){
                    alert('感谢您的资讯，我们会尽快联系您');
                    $('body,html').animate({scrollTop:0},0); 
                    window.location.reload();
                }
                },'json')
            return false;
    })    
    

</script>