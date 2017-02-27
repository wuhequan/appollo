<?php 

namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController
{
    /*服务器基本信息*/
    
    public function index(){
    	if($this->loginBool()){
    		session("nav","index");
            $this->assign("title","网站基本信息");
    		$info = array(
                'info1'=>PHP_OS,
                'info2'=>$_SERVER["SERVER_SOFTWARE"],
                'info3'=>php_sapi_name(),
                'info4'=>THINK_VERSION.' [ <a href="http://thinkphp.cn" target="_blank">查看最新版本</a> ]',
                'info5'=>ini_get('upload_max_filesize'),
                'info6'=>ini_get('max_execution_time').'秒',
                'info7'=>date("Y年n月j日 H:i:s"),
                'info8'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
                'info9'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
                'info10'=>round((@disk_free_space(".")/(1024*1024)),2).'M',
                'info11'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
                'info12'=>(1===get_magic_quotes_gpc())?'YES':'NO',
                'info13'=>(1===get_magic_quotes_runtime())?'YES':'NO',
            );
            
            $this->assign('info',$info);
    		$this->display();
    	}else{
    		$this->error("请登录",U("Admin/Index/pid"));
    	}
		
	}
	    public function pid(){
        if($this->loginBool()){
            session("nav","index");
            $this->assign("title","网站基本信息");
            $info = array(
                'info1'=>PHP_OS,
                'info2'=>$_SERVER["SERVER_SOFTWARE"],
                'info3'=>php_sapi_name(),
                'info4'=>THINK_VERSION.' [ <a href="http://thinkphp.cn" target="_blank">查看最新版本</a> ]',
                'info5'=>ini_get('upload_max_filesize'),
                'info6'=>ini_get('max_execution_time').'秒',
                'info7'=>date("Y年n月j日 H:i:s"),
                'info8'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
                'info9'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
                'info10'=>round((@disk_free_space(".")/(1024*1024)),2).'M',
                'info11'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
                'info12'=>(1===get_magic_quotes_gpc())?'YES':'NO',
                'info13'=>(1===get_magic_quotes_runtime())?'YES':'NO',
            );
            
            $this->assign('info',$info);
            $this->display("Index/index");
        }else{
            $this->display("Index/login");
        }
        
    }
    /*登录*/
	public function login(){
		//echo "1";
		if(!IS_AJAX) {
			$this->error("页面不存在");
		};
		$adminM=M("admin");
        $adminloginM=M("admin_login");
        $addAdminData["admin_id"]=0;
        $addAdminData["loginstatus"]=0;
        $addAdminData["status"]=1;
        $addAdminData["loginip"]=$this->getIP();
        $adminloginData1=$adminloginM->order('login_id desc')->where($addAdminData)->limit(1)->select();
        if($adminloginData1){
            $a=time()-$adminloginData1[0]["lastsavetime"];//获取时间差
            if($adminloginData1[0]["mun"]<=10){//错误次数少于10

            }else if($a>=600&&$adminloginData1[0]["mun"]>10){//错误次数大于十次，但已经过了10分钟
                $adminloginData1=$adminloginM->order('login_id desc')->where($addAdminData)->limit(1)->save(array("mun"=>0));
            }else{
                echo "2";
                return;
            }
        }
        $pw=$this->pwMd5($_POST['password']);
		$adminData=$adminM->where(array('admin_username'=>$_POST['username'],'admin_password'=>$pw,'status'=>1))->find();
		//print_r($pw);exit;
		if($adminData){
			$adminM->where(array('admin_id'=>$adminData['admin_id']))->save(array("lastlogintime"=>time(),"lastloginip"=>$this->getIP()));
			$addAdminData["admin_id"]=$adminData['admin_id'];
            $addAdminData["loginstatus"]=1;
            $addAdminData["mun"]=0;
            $addAdminData["status"]=1;
            $addAdminData["createtime"]=time();
            $addAdminData["lastsavetime"]=time();
            $addAdminData["loginip"]=$this->getIP();
            session('admin_id',$adminData['admin_id']);
			session('admin_username',$adminData['admin_username']);
			session('admin_password',$adminData['admin_password']);
            
            $saveAdminData["admin_id"]=0;
            $saveAdminData["loginstatus"]=0;
            $saveAdminData["status"]=1;
            $saveAdminData["loginip"]=$this->getIP();
            $adminloginM->order('login_id desc')->where($saveAdminData)->limit(1)->save(array("status"=>0));
            $adminloginM->add($addAdminData);

			echo "1";
		}else{
            $addAdminData["admin_id"]=0;
            $addAdminData["loginstatus"]=0;
            $addAdminData["status"]=1;
            $addAdminData["loginip"]=$this->getIP();
            $adminloginData2=$adminloginM->order('login_id desc')->where($addAdminData)->limit(1)->select();
            if($adminloginData2){
                $saveAdminData["mun"]=$adminloginData2[0]["mun"]+1;
                $saveAdminData["lastsavetime"]=time();
                $adminloginM->order('login_id desc')->where($addAdminData)->limit(1)->save($saveAdminData);
            }else{
                $addAdminData["mun"]=1;
                $addAdminData["createtime"]=time();
                $addAdminData["lastsavetime"]=time();
                $adminloginM->add($addAdminData);
            }
			echo "0";
		}
	}
    public function bottoms(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"index_bottoms","title"=>"底部展示","model"=>"bottoms","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        $this->assign('data',$dataData);

        $this->display();
    }
    public function bottoms_add(){
        $dataData=$this->oneLoad("index_bottoms","bottoms");
        $this->display("Index/bottoms_AE");
    }
    public function bottoms_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("index_bottoms","底部展示","bottoms","bottoms_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $this->display("Index/bottoms_AE");
    }
     public function bottoms_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/bottoms";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/bottoms".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['createtime']=time();


        if(!empty($dataid)){
            $whereData["bottoms_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"bottoms",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"bottoms",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }
	
}
	









?>