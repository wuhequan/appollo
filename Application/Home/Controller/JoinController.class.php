<?php
namespace Home\Controller;
use Think\Controller;
class JoinController extends BaseController{
	public function index(){
		//banner
		$banner=M('banner_exhibition')->where('status=1')->order('sort desc')->find();
		$this->assign('banner',$banner);


		$join=M('join')->where('join_id=1')->find();
		$join['info']=explode('|', $join['info']);
		$join['maxUrl']=explode(',', $join['maxUrl']);
		$arr=array();
			foreach ($join['maxUrl'] as $key => $value) {
				$arr[$key/4][$key%4]=$value;
			}
		
		$this->assign('arr',$arr);

	
		$this->assign('join',$join);

		//十大优势
		$advantage=M('advantage')->order('sort desc')->select();
		$this->assign('advantage',$advantage);

		//十大保障
		$safeguard=M('safeguard')->order('sort desc')->select();
		$this->assign('safeguard',$safeguard);

		//十大政策
		$policy=M('policy')->order('sort desc')->select();
		$left=array();
		$right=array();
		foreach ($policy as $k => $v) {
			if ($k%2==0)$left[]=$v;
			if ($k%2!=0)$right[]=$v;
		}
		$this->assign('left',$left);
		$this->assign('right',$right);


		$this->display();
	}


	public function doform(){

		if(IS_AJAX){
			$data=I('post.'); 
			$data['ctime']=strtotime('now');
			if(empty($data['user_name'])){
					$this->ajaxReturn('2');exit;

			}
			if(empty($data['phone'])){
					$this->ajaxReturn('4');exit;

			}
			if(empty($data['address'])){
					$this->ajaxReturn('5');exit;

			}
			if(empty($data['content'])){
					$this->ajaxReturn('6');exit;
			}
		
			$data['createtime']=time();
			$id=M('comment')->add($data);
			if($id>0){
					$this->ajaxReturn('1');
			}else{
					$this->ajaxReturn('0');
			}
		}
		
	}
}