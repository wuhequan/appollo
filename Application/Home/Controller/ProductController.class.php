<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends BaseController{
	//产品首页
	public function index(){
		//banner
		$banner=M('banner_product')->where('status=1')->order('sort desc')->find();
		$this->assign('banner',$banner);

		//产品分类
		$classify=M('product_classify')->where('status=1 AND pid=0')->order('sort desc')->select();
		$this->assign('classify',$classify);

		//产品列表
		if (isset($_GET['pid'])) {
			$pid = $_GET['pid'];
			$where['pid']=$pid;
		}else{
			$pid = $_GET['pids'];
			$where['product_classify_id']=$pid;
		}
		$where['status']=1;
		$product=M('product')->where($where)->order('sort desc')->limit(12)->select();
		$data=array();
			foreach ($product as $k => $v) {
				$data[$k/4][$k%4]=$v;
			}
		$this->assign('data',$data);

		if (isset($_GET['pids'])) {
			$pidss=I('get.pids');
			$pre_data=M('product_classify')->where('product_classify_id='.$pidss)->find();
			$pre_pid=$pre_data['pid'];
			$this->assign('pre_pid',$pre_pid);
		}
		

		
		$this->display();
	}
	
	public function product_sub(){

		if(!IS_AJAX){$this->error('非法请求');}
        $su=I('get.su');
        $first= '12'+ $su*4;
        if (isset($_GET['pid'])) {
        	if ($_GET['pid']!=0) {
        		$pid = $_GET['pid'];
				$where['pid']=$pid;
        	}else{
        		$pid = $_GET['pids'];
				$where['product_classify_id']=$pid;
        	}
		}
		$where['status']=1;
        $count=M('product')->where($where)->count();
     
        if($first < $count){
        	
        	$data=M('product')->where($where)->order('sort desc,showtime desc')->limit($first,'4')->select();
        	$this->ajaxReturn($data);
    	}else{
            $this->ajaxReturn("1");
        }
       
	}

	//产品详情
	public function detail(){
		$pid=I('pid');
		$data=M('product')->where('product_id='.$pid)->find();
		$data['maxUrl']=explode(',', $data['maxUrl']);
		$data['maxUrl1']=explode(',', $data['maxUrl1']);
		$this->assign('data',$data);

		//相关
		$ids=$data['recommen'];
		$wheres['product_id']=array('in',$ids);
		$datas=M('product')->where($wheres)->order('sort desc,showtime desc')->select();
		$arr=array();
			foreach ($datas as $key => $value) {
				$arr[$key/4][$key%4]=$value;
			}
		
		$this->assign('arr',$arr);
		

		$this->display();
	}


	
}