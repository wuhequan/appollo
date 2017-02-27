<?php 

namespace Admin\Controller;
use Think\Controller;
class NavController extends BaseController
{
    /*classify*/
    public function top(){
        
        if($this->loginBool()){
            session("nav","nav_top");
            $this->assign("title","前端菜单");
            $dataM=M("nav_top");
            $dataData=$dataM->where(array("level_id"=>1))->order("sort desc")->select();
            foreach ($dataData as $key => $value) {
                $dataData[$key]["child"]=$dataM->where(array("father_id"=>$value["nav_top_id"]))->order("sort desc")->select();
                if($dataData[$key]["child"]){
                    foreach ($dataData[$key]["child"] as $key1 => $value1) {
                        $dataData[$key]["child"][$key1]["child"]=$dataM->where(array("father_id"=>$value1["nav_top_id"]))->order("sort desc")->select();
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
    public function top_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data['father_id']=addslashes(htmlspecialchars($_POST["father_id"]));
        $data['level_id']=addslashes(htmlspecialchars($_POST["level_id"]));
        $data['title']=addslashes(htmlspecialchars($_POST["title"]));
        $data['url']=addslashes(htmlspecialchars($_POST["url"]));
        $data['pid']=addslashes(htmlspecialchars($_POST["pid"]));
        $data['name']=addslashes(htmlspecialchars($_POST["name"]));
        $data['status']=addslashes(htmlspecialchars($_POST["status"]));
        $data['sort']=addslashes(htmlspecialchars($_POST["sort"]));
        $data['news']=addslashes(htmlspecialchars($_POST["news"]));
        $data['icon']=addslashes(htmlspecialchars($_POST["icon"]));
        $dataM=M("nav_top");
        if(!empty($dataid)){
            $whereData["nav_top_id"]=$dataid;
            echo $dataM->where($whereData)->save($data);
        }else{
            echo $dataM->add($data);
        }
    }
    public function top_del(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        
        $dataM=M("nav_top");
        if($dataM->where(array("nav_top_id"=>$dataid))->delete()){
            echo "1";
        }else{
            echo "0";
        }
    }

    public function left(){
        if($this->loginBool()){
            session("nav","nav_left");
            $this->assign("title","NAV");
            $dataM=M("nav_left");
            $dataData=$dataM->where(array("level_id"=>1))->order("sort desc")->select();
            foreach ($dataData as $key => $value) {
                $dataData[$key]["child"]=$dataM->where(array("father_id"=>$value["nav_left_id"]))->order("sort desc")->select();
                if($dataData[$key]["child"]){
                    foreach ($dataData[$key]["child"] as $key1 => $value1) {
                        $dataData[$key]["child"][$key1]["child"]=$dataM->where(array("father_id"=>$value1["nav_left_id"]))->order("sort desc")->select();
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
    public function left_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data['father_id']=addslashes(htmlspecialchars($_POST["father_id"]));
        $data['level_id']=addslashes(htmlspecialchars($_POST["level_id"]));
        $data['title']=addslashes(htmlspecialchars($_POST["title"]));
        $data['url']=addslashes(htmlspecialchars($_POST["url"]));
        $data['icon']=addslashes(htmlspecialchars($_POST["icon"]));
        $data['name']=addslashes(htmlspecialchars($_POST["name"]));
        $data['status']=addslashes(htmlspecialchars($_POST["status"]));
        $data['sort']=addslashes(htmlspecialchars($_POST["sort"]));
        $dataM=M("nav_left");
        if(!empty($dataid)){
            $whereData["nav_left_id"]=$dataid;
            echo $dataM->where($whereData)->save($data);
        }else{
            echo $dataM->add($data);
        }
    }
    public function left_del(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        
        $dataM=M("nav_left");
        if($dataM->where(array("nav_left_id"=>$dataid))->delete()){
            echo "1";
        }else{
            echo "0";
        }
    }
    


    public function foot(){
        if($this->loginBool()){
            session("nav","site_foot");
            $this->assign("title","NAV");
            $dataM=M("nav_foot");
            $dataData=$dataM->where(array("level_id"=>1))->select();
            foreach ($dataData as $key => $value) {
                $dataData[$key]["child"]=$dataM->where(array("father_id"=>$value["nav_foot_id"]))->select();
            }
            $this->assign('data',$dataData);
            $this->display();
        }else{
            $this->display("Index/login");
        }
    }
    public function foot_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data['father_id']=addslashes(htmlspecialchars($_POST["father_id"]));
        $data['title']=addslashes(htmlspecialchars($_POST["title"]));
        $data['url']=addslashes(htmlspecialchars($_POST["url"]));
        $dataM=M("nav_foot");
        if(!empty($dataid)){
            $whereData["nav_foot_id"]=$dataid;
            echo $dataM->where($whereData)->save($data);
        }else{
            $data['level_id']=2;
            echo $dataM->add($data);
        }
    }
    public function foot_del(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        
        $dataM=M("nav_foot");
        if($dataM->where(array("nav_foot_id"=>$dataid))->delete()){
            echo "1";
        }else{
            echo "0";
        }
    }
    
	
}
	









?>