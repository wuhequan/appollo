<?php
namespace Home\Controller;
use Think\Controller;
class ProjectController extends BaseController{
	//项目首页
	public function index(){
		//banner
		$banner=M('banner_project')->where('status=1')->order('sort desc')->select();
		$this->assign('banner',$banner);

		//项目分类
		$classify=M('project_classify')->where('status=1')->order('sort desc')->select();
		$this->assign('classify',$classify);

		//当前分类和项目
		$classify_id=$classify[0]['project_classify_id'];
		$id = isset($_GET['cate_id']) ? $_GET['cate_id'] : $classify_id;
		$curr_cate=M('project_classify')->where('project_classify_id='.$id)->find();
		$this->assign('curr_cate',$curr_cate);

		$where['status']=1;
		$where['project_classify_id']=$id;
		$data=M('project')->where($where)->order('sort desc,showtime desc')->select();
		$arr=array();
			foreach ($data as $key => $value) {
				$arr[$key/4][$key%4]=$value;
			}
		$this->assign('arr',$arr);	
		
		$this->display();
	}
	//项目详情
	public function detail(){
		$id=I('id');
		$data=M('project')->where('project_id='.$id)->find();
		$data['maxUrl']=explode(',', $data['maxUrl']);
		$this->assign('data',$data);	
		$this->display();
	}
}