<?php
namespace Home\Controller;
use Think\Controller;
class CasesController extends BaseController{

	public function index(){
		//banner
		$banner=M('banner_project')->where('status=1')->order('sort desc')->find();
		$this->assign('banner',$banner);


		//案例分类
		$arr=M('project_classify')->where('status=1')->order('sort desc')->select();
		$classify=array();
			foreach ($arr as $key => $value) {
				$classify[$key/3][$key%3]=$value;
			}

		$this->assign('classify',$classify);

		//新闻列表
		$pid=I('get.pid');
		$where['project_classify_id']=$pid;
		$where['status']=1;
		$data=M('project')->where($where)->order('sort desc')->limit(6)->select();
		$this->assign('data',$data);
		$this->display();
	}

	public function news_sub(){

		if(!IS_AJAX){$this->error('非法请求');}
        $su=I('get.su');
        $first= '6'+ $su*6;
        $pid=I('get.pid');
		$where['project_classify_id']=$pid;
		$where['status']=1;
        $count=M('project')->where($where)->count();
        if($first < $count){
        	$data=M('project')->where($where)->order('sort desc,showtime desc')->limit($first,'6')->select();
        	$this->ajaxReturn($data);
    	}else{
            $this->ajaxReturn("1");
        }
       
	}

	public function detail(){
		$pid=I('pid');
		$data=M('project')->where('project_id='.$pid)->find();
		$data['maxUrl']=explode(',', $data['maxUrl']);
		$this->assign('data',$data);

		//相关
		$ids=$data['recommen'];
		$wheres['project_id']=array('in',$ids);
		$datas=M('project')->where($wheres)->order('sort desc,showtime desc')->select();
		$arr=array();
			foreach ($datas as $key => $value) {
				$arr[$key/4][$key%4]=$value;
			}
	
		$this->assign('arr',$arr);

		


		$this->display();
	}



}