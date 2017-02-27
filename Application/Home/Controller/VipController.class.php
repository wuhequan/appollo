<?php
namespace Home\Controller;
use Think\Controller;
class VipController extends BaseController{
	//VIP登陆
	public function login(){

		$this->display();
	}

	public function dologin(){

		if(IS_AJAX){
			$data=I('post.'); 
			if(empty($data['title'])){
					$this->ajaxReturn('2');exit;

			}
			if(empty($data['password'])){
					$this->ajaxReturn('3');exit;

			}
			$title=$data['title'];
			$password=$data['password'];
			$where['status']=1;
			$where['title']=$title;
			$datas=M('account')->where($where)->find();


			if($datas['password']==$password){
					session('title',$datas['title']); 
					session('password',$datas['password']);  
					$this->ajaxReturn('1');
			}else{
					$this->ajaxReturn('0');
			}
		}
		
	}
	//活动资讯
	public function information(){
		//banner
		$banner=M('banner_vip')->where('status=1')->order('sort desc')->find();
		$this->assign('banner',$banner);

		if (session('?title')) {
			$title=session('title');
			$datas=M('account')->where($where)->find();
			$rule=$datas['rank_classify_id'];
			$where['status']=1;
			$where['rank_classify_id']=$rule;
			$data=M('information')->where($where)->limit(4)->select();

			$this->assign('data',$data);
			$this->display();
		}else{
			$this->display('login');
		}
	}

	public function news_sub(){

		if(!IS_AJAX){$this->error('非法请求');}
        $su=I('get.su');
        $first= '4'+ $su*4;
        $title=session('title');
		$datas=M('account')->where($where)->find();
		$rule=$datas['rank_classify_id'];
		$where['rank_classify_id']=$rule;
		$where['status']=1;
        $count=M('information')->where($where)->count();
        if($first < $count){
        	
        	$data=M('information')->where($where)->order('sort desc,showtime desc')->limit($first,'4')->select();
        	foreach ($data as $k => $v) {
        		$data[$k]['showtime']=date('Y-m-d',$data[$k]['showtime']);
        	}
        	$this->ajaxReturn($data);
    	}else{
            $this->ajaxReturn("1");
        }
       
	}

	public function detail(){
		$pid=I('id');
		$data=M('information')->where('information_id='.$pid)->find();
		$this->assign('data',$data);

		$this->display();
	}


	//资料下载
	public function load(){
		
		if (session('?title')) {
			$title=session('title');
			$datas=M('account')->where($where)->find();
			$rule=$datas['rank_classify_id'];
			$where['status']=1;
			$where['rank_classify_id']=$rule;
			$data=M('load')->where($where)->limit(5)->select();
			$this->assign('data',$data);
			$this->display();
		}else{
			$this->display('login');
		}
	}

	public function news_sub1(){
		if(!IS_AJAX){$this->error('非法请求');}
        $su=I('get.su');
        $first= '5'+ $su*5;
        $title=session('title');
		$datas=M('account')->where($where)->find();
		$rule=$datas['rank_classify_id'];
		$where['rank_classify_id']=$rule;
		$where['status']=1;
        $count=M('load')->where($where)->count();
        if($all=='all'){
        	$this->ajaxReturn("1");
        }else if($first < $count){
        	$data=M('load')->where('status=1')->order('sort desc,showtime desc')->limit($first,'5')->select();
        	foreach ($data as $k => $v) {
        		
        		$data[$k]['showtimemd']=date('Y-m-d',$data[$k]['showtime']);
        	}
        	$this->ajaxReturn($data);
    	}else{
            $this->ajaxReturn("1");
        }
       
	}

	




}