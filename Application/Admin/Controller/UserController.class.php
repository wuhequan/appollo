<?php 

namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController
{
    public function classify(){
        $dataData=$this->listLoad("user_classify","会员");
        $data=$this->getClassify("user_classify","","","","0");
        $this->assign("data",$data);
        $this->display();
    }
    public function classify_add(){
        $dataData=$this->listLoad("user_classify");
        $data=$this->displayClassify("user_classify");
        $this->assign('dataclassify',$data);
        $this->display("User/classify_AE");
    }
    public function classify_editor(){
        $id=I("get.id");
        $dataData=$this->oneLoad("user_classify","PAPET","user_classify","user_classify_id",$id);
        $this->assign("data",$dataData);

        $data=$this->displayClassify("user_classify",$dataData['pid']);
        $this->assign('dataclassify',$data);



        $this->display("User/classify_AE");

    }
    public function classify_Submit(){
        if(!IS_AJAX){U('Index/index');}
        if(!$this->loginBool()){return;}
        
        $dataid=I("POST.dataid");

        $data=I("POST.");
        //print_r($data);exit;
        $data['lastsavetime']=time();
        
        if(!empty($dataid)){
            $whereData["user_classify_id"]=$dataid;
            if($this->formEditorSubmit($data,"user_classify",$whereData)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddSubmit($data,"user_classify")){echo "1";}else{echo "0";}
        }
    }

    public function index (){
        $status=addslashes(htmlspecialchars($_GET["status"]));
        if(is_numeric($status))$whereData["status"]=$status;
        $dataData=$this->listLoad("user_index","会员","user",$whereData,"user_id desc");
        $classifyM=M("user_classify");
        $classifyData=$this->listClassify("user_classify");
        foreach ($dataData as $key => $value) {
            foreach ($classifyData as $key1 => $value1) {
                if($value['user_classify_id']==$value1['user_classify_id']){
                    $dataData[$key]["classify"]=$value1["title"];
                    continue;
                }
            }
        }
        $this->assign('data',$dataData);
        $this->display();
    } 

    public function add(){
        $dataData=$this->oneLoad("user_index","会员");

        $classify=$this->displayClassify("user_classify");
        $this->assign("dataclassify",$classify);

        
        $this->display("User/index_AE");
    }
    public function editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("user_index","会员","user","user_id",$dataid);
        $dataData["createtimeshow"]=date('Y-m-d',$dataData["createtime"]);


        $classify=$this->displayClassify("user_classify","",$dataData['user_classify_id']);
        $this->assign("dataclassify",$classify);

        $this->assign("data",$dataData);

        $this->display("User/index_AE");
    }
    public function index_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");
        
        if(empty($data['createtime'])){
            $dirtime=date('Ym',time());
        }else{
            $dirtime=date('Ym',$data['createtime']);
        }

        $dirnameid="";
        $dirname="Public/upload/user/".$dirtime;
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/user/".$dirtime.$dirnameid, $imageUrl);
        $imageData[0]['imageUrl']=$imageUrl;
        $imageData[0]['title']="imageUrl";

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();



        
        
        if(!empty($dataid)){
            $whereData["user_id"]=$dataid;
            if($this->formEditorImageSubmit($data,"user",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmit($data,"user",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }
    /*权限*/
    public function role(){
        $dataData=$this->listLoad("user_role","会员");
        $data=$this->getClassify("user_role","","","","0");
        $this->assign("data",$data);
        $this->display();
    }
    public function role_add(){
        $dataData=$this->listLoad("user_role");
        $data=$this->displayClassify("user_role");
        $this->assign('dataclassify',$data);
        $this->display("User/role_AE");
    }
    public function role_editor(){
        $id=I("get.id");
        $dataData=$this->oneLoad("user_role","会员","user_role","user_classify_id",$id);
        $this->assign("data",$dataData);

        $data=$this->displayClassify("user_role",$dataData['pid']);
        $this->assign('dataclassify',$data);



        $this->display("User/role_AE");

    }
    public function role_Submit(){
        if(!IS_AJAX){U('Index/index');}
        if(!$this->loginBool()){return;}
        
        $dataid=I("POST.dataid");

        $data=I("POST.");
        //print_r($data);exit;
        $data['lastsavetime']=time();
        
        if(!empty($dataid)){
            $whereData["user_role_id"]=$dataid;
            if($this->formEditorSubmit($data,"user_role",$whereData)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddSubmit($data,"user_role")){echo "1";}else{echo "0";}
        }
    }
    //职业分类
    public function jobclassify(){
        $dataData=$this->listLoad("user_jobclassify","职业");
        $data=$this->getClassify("user_jobclassify","","","","0");
        $this->assign("data",$data);
        $this->display();
    }
    public function jobclassify_add(){
        $dataData=$this->listLoad("user_jobclassify");
        $data=$this->displayClassify("user_jobclassify");
        $this->assign('dataclassify',$data);
        $this->display("User/jobclassify_AE");
    }
    public function jobclassify_editor(){
        $id=I("get.id");
        $dataData=$this->oneLoad("user_jobclassify","PAPET","user_jobclassify","user_jobclassify_id",$id);
        $this->assign("data",$dataData);
        $data=$this->displayClassify("user_jobclassify",$dataData['pid']);
        $this->assign('dataclassify',$data);
        $this->display("User/jobclassify_AE");

    }
    public function jobclassify_Submit(){
        if(!IS_AJAX){U('Index/index');}
        if(!$this->loginBool()){return;}
        
        $dataid=I("POST.dataid");

        $data=I("POST.");
        //print_r($data);exit;
        $data['lastsavetime']=time();
        
        if(!empty($dataid)){
            $whereData["user_jobclassify_id"]=$dataid;
            if($this->formEditorSubmit($data,"user_jobclassify",$whereData)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddSubmit($data,"user_jobclassify")){echo "1";}else{echo "0";}
        }
    }

    //地区分类
    public function areaclassify(){
        $pid=I("get.pid");
        if(!empty($pid)){
            $where['pid']=$pid;
            $name=M('user_areaclassify')->where(array('user_areaclassify_id'=>$pid))->find();
            
        }else{
            $where['pid']='0';
        }
        $dataData=$this->listLoad("user_areaclassify","地区".$name['title']);
        //$data=$this->getClassify("user_areaclassify","","","","0");
        
        $data=M('user_areaclassify')->where($where)->select();
        //echo M('user_areaclassify')->_sql();
        $this->assign("data",$data);
        $this->display();
    }
    public function areaclassify_add(){
        $pid=I('get.pid');
        $dataData=$this->oneLoad("user_areaclassify","地区");
        $dataData=M('user_areaclassify')->where(array('pid'=>$pid))->select();
        //$data=$this->displayClassify("user_areaclassify");
        $this->assign('data',$dataData);
        $this->display("User/areaclassify_AE");
    }
    public function areaclassify_editor(){
        $id=I("get.id");
        $dataData=$this->oneLoad("user_areaclassify","地区","user_areaclassify","user_areaclassify_id",$id);
        $this->assign("data",$dataData);
        //$data=$this->displayClassify("user_areaclassify",$dataData['pid']);
        $this->assign('dataclassify',$data);
        $this->display("User/areaclassify_AE");

    }
    public function areaclassify_Submit(){
        if(!IS_AJAX){U('Index/index');}
        if(!$this->loginBool()){return;}
           
        $dataid=I("POST.dataid");

        $data=I("POST.");
        $data['lastsavetime']=time();
        //print_r($data);exit;
        if(!empty($dataid)){
            $whereData["user_areaclassify_id"]=$dataid;
            if($this->formEditorSubmit($data,"user_areaclassify",$whereData)){echo "1";}else{echo "0";}
        }else{
            $data['status']=1;
            if($this->formAddSubmit($data,"user_areaclassify")){echo "1";}else{echo "0";}
        }
    }

    //经验区间分类
    public function ageclassify(){
        $dataData=$this->listLoad("user_ageclassify","年龄区间");
        $data=$this->getClassify("user_ageclassify","","","","0");
        $this->assign("data",$data);
        $this->display();
    }
    public function ageclassify_add(){
        $dataData=$this->listLoad("user_ageclassify");
        $data=$this->displayClassify("user_ageclassify");
        $this->assign('dataclassify',$data);
        $this->display("User/ageclassify_AE");
    }
    public function ageclassify_editor(){
        $id=I("get.id");
        $dataData=$this->oneLoad("user_ageclassify","PAPET","user_ageclassify","user_ageclassify_id",$id);
        $this->assign("data",$dataData);
        $data=$this->displayClassify("user_ageclassify",$dataData['pid']);
        $this->assign('dataclassify',$data);
        $this->display("User/ageclassify_AE");

    }
    public function ageclassify_Submit(){
        if(!IS_AJAX){U('Index/index');}
        if(!$this->loginBool()){return;}
        
        $dataid=I("POST.dataid");

        $data=I("POST.");
        $data['lastsavetime']=time();
        
        if(!empty($dataid)){
            $whereData["user_ageclassify_id"]=$dataid;
            if($this->formEditorSubmit($data,"user_ageclassify",$whereData)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddSubmit($data,"user_ageclassify")){echo "1";}else{echo "0";}
        }
    }


    //奖项区间分类
    public function awardclassify(){
        $dataData=$this->listLoad("user_awardclassify","奖项分类");
        $data=$this->getClassify("user_awardclassify","","","","0");
        $this->assign("data",$data);
        $this->display();
    }
    public function awardclassify_add(){
        $dataData=$this->listLoad("user_awardclassify");
        $data=$this->displayClassify("user_awardclassify");
        $this->assign('dataclassify',$data);
        $this->display("User/awardclassify_AE");
    }
    public function awardclassify_editor(){
        $id=I("get.id");
        $dataData=$this->oneLoad("user_awardclassify","PAPET","user_awardclassify","user_awardclassify_id",$id);
        $this->assign("data",$dataData);
        $data=$this->displayClassify("user_awardclassify",$dataData['pid']);
        $this->assign('dataclassify',$data);
        $this->display("User/awardclassify_AE");

    }
    public function awardclassify_Submit(){
        if(!IS_AJAX){U('Index/index');}
        if(!$this->loginBool()){return;}
        
        $dataid=I("POST.dataid");

        $data=I("POST.");
        $data['lastsavetime']=time();
        
        if(!empty($dataid)){
            $whereData["user_awardclassify_id"]=$dataid;
            if($this->formEditorSubmit($data,"user_awardclassify",$whereData)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddSubmit($data,"user_awardclassify")){echo "1";}else{echo "0";}
        }
    }

	
}
	









?>