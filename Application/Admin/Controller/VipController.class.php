<?php 

namespace Admin\Controller;
use Think\Controller;
class VipController extends BaseController{

	//身份
    public function classify(){
        $dataData=$this->listLoad("vip_classify","Vip");
        $data=$this->getClassify("rank_classify","0","","","0");
        $this->assign("data",$data);
        $this->display();
    } 
     public function classify_add(){
        $dataData=$this->listLoad("vip_classify","Vip");
        $data=$this->displayClassify("rank_classify");

        $this->assign('dataclassify',$data);
        $this->display("Vip/classify_AE");
    }
    public function classify_editor(){
        $id=I("get.id");
        $dataData=$this->oneLoad("vip_classify","Vip","rank_classify","rank_classify_id",$id);
        $this->assign("data",$dataData);

        $data=$this->displayClassify("rank_classify",$dataData['pid']);
        $this->assign('dataclassify',$data);
        $this->display("Vip/classify_AE");

    }
    public function classify_Submit(){
        if(!IS_AJAX){U('Index/index');}
        if(!$this->loginBool()){return;}
        
        $dataid=I("POST.dataid");

        $data=I("POST.");
        //print_r($data);exit;
        $data['lastsavetime']=time();
        
        if(!empty($dataid)){
            $whereData["rank_classify_id"]=$dataid;
            if($this->formEditorSubmit($data,"rank_classify",$whereData)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddSubmit($data,"rank_classify")){echo "1";}else{echo "0";}
        }
    }


    //咨询
    public function information(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"vip_information","title"=>"活动资讯","model"=>"information","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        $classifyM=M("rank_classify");
        $classifyData=$this->listClassify("rank_classify");
        foreach ($dataData as $key => $value) {
            foreach ($classifyData as $key1 => $value1) {
                if($value['rank_classify_id']==$value1['rank_classify_id']){
                    $dataData[$key]["classify"]=$value1["title"];
                    continue;
                }
            }
           
        }
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function information_add(){
        $dataData=$this->oneLoad("vip_information","活动资讯");

        $classify=$this->displayClassify("rank_classify","",$dataData['rank_classify_id'],"classify");
        $this->assign("dataclassify",$classify);

        $this->display("Vip/information_AE");
    }
    public function information_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("vip_information","活动资讯","information","information_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);
        $dataData['maxUrls']=explode(',',$dataData['maxUrl']);

        $this->assign("data",$dataData);

        $classify=$this->displayClassify("rank_classify","",$dataData['rank_classify_id'],"classify");
        $this->assign("dataclassify",$classify);

        $this->display("Vip/information_AE");
    }
     public function information_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/information";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/information".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

       

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["information_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"information",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"information",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }


    //资料下载
    public function load(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"vip_load","title"=>"物料下载","model"=>"load","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));

        $classifyM=M("rank_classify");
        $classifyData=$this->listClassify("rank_classify");
        foreach ($dataData as $key => $value) {
            foreach ($classifyData as $key1 => $value1) {
                if($value['rank_classify_id']==$value1['rank_classify_id']){
                    $dataData[$key]["classify"]=$value1["title"];
                    continue;
                }
            }
           
        }
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function load_add(){
        $dataData=$this->oneLoad("vip_load","物料下载");

        $classify=$this->displayClassify("rank_classify","",$dataData['rank_classify_id'],"classify");
        $this->assign("dataclassify",$classify);

        $this->display("Vip/load_AE");
    }
    public function load_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("vip_load","物料下载","load","load_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $classify=$this->displayClassify("rank_classify","",$dataData['rank_classify_id'],"classify");
        $this->assign("dataclassify",$classify);

        $this->display("Vip/load_AE");
    }
     public function load_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/load";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/load".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["load_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"load",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"load",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }


    //账号管理
    public function account(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"vip_account","title"=>"账号管理","model"=>"account","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));

        $classifyM=M("rank_classify");
        $classifyData=$this->listClassify("rank_classify");
        foreach ($dataData as $key => $value) {
            foreach ($classifyData as $key1 => $value1) {
                if($value['rank_classify_id']==$value1['rank_classify_id']){
                    $dataData[$key]["classify"]=$value1["title"];
                    continue;
                }
            }
           
        }
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function account_add(){
        $dataData=$this->oneload("vip_account","账号管理");

        $classify=$this->displayClassify("rank_classify","",$dataData['rank_classify_id'],"classify");
        $this->assign("dataclassify",$classify);

        $this->display("Vip/account_AE");
    }
    public function account_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneload("vip_account","账号管理","account","account_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $classify=$this->displayClassify("rank_classify","",$dataData['rank_classify_id'],"classify");
        $this->assign("dataclassify",$classify);

        $this->display("Vip/account_AE");
    }
     public function account_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");
        

      
        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
       

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["account_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"account",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"account",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

}