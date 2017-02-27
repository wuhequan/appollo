<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends BaseController{

	public function login(){

		$this->display();
	}
	public function doform(){
		if(IS_AJAX){
			$data=I('post.'); 
			if(empty($data['username'])){
					$this->ajaxReturn('2');exit;

			}
			if(empty($data['password'])){
					$this->ajaxReturn('3');exit;

			}
			$verify = I('param.verify','');  
				if(!check_verify($verify)){  
					$this->ajaxReturn('4');exit();
			}
			$adminM = M('user');
			$pw=$this->pwMd5($data['password']);
			$data=array(
                'username'=>$data['username'],
                'password'=>$pw,
            );
            $resout=$adminM->where($data)->find();
			if($resout){
					session('web_username',$resout['username']);
					session('web_password',$resout['password']);
					$this->ajaxReturn('1');
			}else{
					$this->ajaxReturn('0');
			}
		}
		
	}
	public function verify_c(){  
        $Verify = new \Think\Verify();  
        $Verify->fontSize = 15;  
        $Verify->length   = 4;  
        $Verify->useNoise = false;  
        $Verify->codeSet = '0123456789cC';  
        $Verify->imageW = 105;  
        $Verify->imageH = 49;  
        //$Verify->expire = 600;  
        $Verify->entry();  
    }
    public function pwMd5($password){
        $password=md5($password);
        $password=substr($password,4);
        $password="cc".$password;
        $password=md5($password);
        return $password;
    }

    public function register(){  

    	$this->display();
    }

    public function doform01(){
		if(IS_AJAX){
			$data=I('post.'); 
			$data['ctime']=strtotime('now');
			if(empty($data['username'])){
					$this->ajaxReturn('2');exit;

			}
			if(empty($data['password'])){
					$this->ajaxReturn('3');exit;

			}
			if(empty($data['cpassword'])){
					$this->ajaxReturn('4');exit;

			}
			if(empty($data['phone'])){
					$this->ajaxReturn('5');exit;

			}
			if(empty($data['email'])){
					$this->ajaxReturn('6');exit;
			}
			if($data['password']!=$data['cpassword']){
					$this->ajaxReturn('7');exit;
			}
			$data['password']=$this->pwMd5($data['password']);
			$id=M('user')->add($data);
			if($id>0){
					$this->ajaxReturn('1');
			}else{
					$this->ajaxReturn('0');
			}
		}
		
	}
}