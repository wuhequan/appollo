<?php 

namespace Admin\Controller;
use Think\Controller;
class AdminController extends BaseController
{
    /*index*/
    public function admin(){

        $dataData=$this->listLoad("admin","ADMIN","admin","","","","1");
        foreach ($dataData as $key => $value) {
            $dataData[$key]["lastlogintime"]=date("Y-m-d H:i:s",$dataData[$key]["lastlogintime"]);
        }
        $this->assign('data',$dataData);
        $this->display();
    }
    public function add_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));

        $data['admin_username']=addslashes(htmlspecialchars($_POST["admin_username"]));
        $data['admin_password']=addslashes(htmlspecialchars($_POST["admin_password"]));
        $data['admin_password']=$this->pwMd5($data['admin_password']);

        $data['lastlogintime']=time();
        $data['lastloginip']=$this->getIP();
        $data['createtime']=time();
        $data['status']=1;


        if($this->formAddSubmit($data,"admin")){echo "1";}else{echo "0";}
        
    }
    
    /*修改权限*/
    public function role(){
        if($this->loginBool()){
           
            $this->assign("title","ADMIN");
            $dataid=addslashes(htmlspecialchars($_GET["dataid"]));
            $adminM=M("admin");
            $adminData=$adminM->where(array("admin_id"=>$dataid))->find();

            $this->assign('admin',$adminData);

            $dataM=M("nav_left");
            /*整合数组*/

            $dataData=$dataM->where(array("level_id"=>1))->order("sort desc")->select();
            foreach ($dataData as $key => $value) {
                $dataData[$key]["child"]=$dataM->where(array("father_id"=>$value["nav_left_id"]))->order("sort desc")->select();
                if($dataData[$key]["child"]){
                    foreach ($dataData[$key]["child"] as $key1 => $value1) {
                        $dataData[$key]["child"][$key1]["child"]=$dataM->where(array("father_id"=>$value1["nav_left_id"]))->order("sort desc")->select();
                    }
                }
            }
            foreach ($dataData as $key => $value) {
                if(strstr($adminData["role"],",".$value["nav_left_id"].","))
                    $dataData[$key]["checkbox"]=1;
                
                foreach ($value["child"] as $key1 => $value1) {
                    if(strstr($adminData["role"],",".$value1["nav_left_id"].","))
                        $dataData[$key]["child"][$key1]["checkbox"]=1;
                        foreach ($value1["child"] as $key2 => $value2) {
                            if(strstr($adminData["role"],",".$value2["nav_left_id"].","))
                                $dataData[$key]["child"][$key1]["child"][$key2]["checkbox"]=1;
                        }
                }
            }

            
            //print_r($dataData);exit();
            $this->assign('data',$dataData);
            $this->display();
        }else{
            $this->display("Index/login");
        }
    }
    public function role_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data['role']=addslashes(htmlspecialchars($_POST["role"]));
    
        $whereData["admin_id"]=$dataid;
        if($this->formEditorSubmit($data,"admin",$whereData)){echo "1";}else{echo "0";}
        
    }
    

    /*修改密码*/
    public function changePass(){
        if($this->loginBool()){
            $this->assign("title","更换密码");
            $this->display("Admin/passwd");
        }else{
            $this->display("Index/login");
        }
    }
    public function changePass_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        session("nav","");
        $adminM=M("admin");
        $oldpw=$this->pwMd5(addslashes(htmlspecialchars($_POST["oldpw"])));
        $data["admin_password"]=addslashes(htmlspecialchars($_POST["newpw"]));
        $data["admin_password"]=$this->pwMd5($data["admin_password"]);
        if($adminM->where(array("admin_id"=>$_SESSION['admin_id'],"admin_username"=>$_SESSION['admin_username'],"admin_password"=>$oldpw))->find()){
            if($adminM->where(array("admin_id"=>$_SESSION['admin_id'],"admin_username"=>$_SESSION['admin_username']))->save($data)){
                echo "1";
            }else{
                echo "0";
            }
        }else{
            echo "2";
        }
    }
    /*注销*/
    public function clearSession(){
        session_unset();
        echo "<script>window.location.href='$_ROOT/pid-vip.html'</script>";
    }
    /*信息*/
    public function index(){
        if($this->loginBool()){
            session("nav","");
            $adminM=M("admin");
            $adminData=$adminM->where(array("admin_id"=>$_SESSION['admin_id']))->find();
           
            $adminData["createtime"]=date('Y-m-d H:i:s',$adminData["createtime"]);
            $adminData["lastlogintime"]=date('Y-m-d H:i:s',$adminData["lastlogintime"]);
            
            $this->assign('admin',$adminData);
            $this->display();
        }else{
            $this->display("Index/login");
        }
    }
    
	
}
	









?>