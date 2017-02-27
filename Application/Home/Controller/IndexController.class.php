<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController{
	public function index(){
		//banner
		$banner=M('banner_index')->where('status=1')->order('sort desc')->select();
		$this->assign('banner',$banner);

		//产品推优
    $wh['pid']=array('eq',0);
    $wh['status']=1;
    $arr1=M('product_classify')->where($wh)->order('sort desc')->select();
    $this->assign('first1',$arr1[0]); 

    $product=M('product')->where('status=1 and showindex=1')->order('sort desc,showtime desc')->limit(5)->select();
   	$this->assign('product',$product); 


    //新闻推优
    $arr=M('news_classify')->where('status=1')->order('sort desc')->select();
    $this->assign('first',$arr[0]); 
    
   	$news=M('news')->where('status=1 and showindex=1')->order('sort desc,showtime desc')->limit(4)->select();
   	$this->assign('news',$news); 

    //友情链接
    $friend=M('friend')->where('status=1')->order('sort desc')->select();
    $this->assign('friend',$friend);




		$this->display();
	}

}