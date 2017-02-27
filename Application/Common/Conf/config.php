<?php
return array(
	
	//'配置项'=>'配置值'
	'URL_ROUTER_ON'   => true, 
	'URL_ROUTE_RULES'=>array(
		'pid-vip'	=>	'Admin/Index/pid'
		//'news/:id'	=>	'Home/News/detail'
	),

	'MODULE_ALLOW_LIST'  =>array('Admin',"Home"),
	'DEFAULT_MODULE'     => 'Home', //默认模块
	'DEFAULT_CONTROLLER' => 'Index', //控制器名称
	'DEFAULT_ACTION'	 => 'index', //操作名称	
	'DB_TYPE'			 => 'mysql', //数据库类型
	'DB_HOST'			 => 'localhost', //服务器地址
	'DB_NAME'			 => 'appollo',  //数据库名
	'DB_USER'			 => 'root',  //用户名
	'DB_PWD'			 => '',		 //密码6d56ddb821
	'DB_PREFIX'       => 'cies_', 

	'DB_PARAMS'    =>    array(\PDO::ATTR_CASE => \PDO::CASE_NATURAL),
	'DB_PORT'			 =>'3306',  	 //端口
	'URL_HTML_SUFFIX'    =>'html',
    'DEFAULT_CHARSET'       =>  'utf-8', // 默认输出编码	
	
	'URL_MODEL'             =>  2, 

	//允许通过的URL
	'URL_PASS'	=>	array(
		"/Admin/Index/login",
		"/Admin/Index/pid",
		"/Admin/Index/index",
		"/Admin/Index/login",

        "/Admin/Admin/index",
        "/Admin/Admin/changePass",
        "/Admin/Admin/clearSession",

        "/Admin/Public/del",
        "/Admin/Public/del_cache",
        "/Admin/Public/del_img",
        "/Admin/Public/changeStatus",
        "/Admin/Public/changeValue",
        "/Admin/Public/uploadImg",
        "/Admin/Public/editor",
        "/Admin/Public/add",
        
	),

	
	


);