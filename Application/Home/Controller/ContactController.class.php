<?php
namespace Home\Controller;
use Think\Controller;
class ContactController extends BaseController{
	public function index(){
		//banner
		$banner=M('banner_contact')->where('status=1')->order('sort desc')->find();
		$this->assign('banner',$banner);

		$data=M('contact')->where('contact_id=1')->find();
		$data['info']=nl2br($data['info']);
		$data['info']=explode('<br />', $data['info']);
		foreach ($data['info'] as $k1 => $v2) {
					$data['info'][$k1]=trim($data['info'][$k1]);
				
		}
		
		$this->assign('data',$data);

		$this->display();
	}

	
}