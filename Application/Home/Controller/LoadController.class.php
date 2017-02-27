<?php
namespace Home\Controller;
use Think\Controller;
class LoadController extends BaseController{
	public function index(){


		$data=M('load')->where('status=1')->order('sort desc,showtime desc')->select();
		$this->assign('data',$data);
		$this->display();
	}

}