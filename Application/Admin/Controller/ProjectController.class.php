<?php 

namespace Admin\Controller;
use Think\Controller;
class ProjectController extends BaseController{
	//项目列表
    public function index (){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"project_index","title"=>"Project","model"=>"project","whereData"=>$whereData,"orderData"=>"project_classify_id asc,showtime desc","field"=>"project_classify_id,showindex"));
        $classifyM=M("project_classify");
        $classifyData=$this->listClassify("project_classify");
        foreach ($dataData as $key => $value) {
            foreach ($classifyData as $key1 => $value1) {
                if($value['project_classify_id']==$value1['project_classify_id']){
                    $dataData[$key]["classify"]=$value1["title"];
                    continue;
                }
            }
        }
        $this->assign('data',$dataData);

        $this->display();
    } 
    public function add(){
        $dataData=$this->oneLoad("project_index","Project");
        $classify=$this->displayClassify("project_classify","","","classify");
        $this->assign("dataclassify",$classify);
        $this->display("project/index_AE");
    }
    public function editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("project_index","Project","project","project_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $classify=$this->displayClassify("project_classify","",$dataData['project_classify_id'],"classify");
        $this->assign("dataclassify",$classify);

        $dataData['maxUrls']=explode(',',$dataData['maxUrl']);
        $this->assign("data",$dataData);
        //print_r($dataData0);

        $this->display("project/index_AE");
    }
 
    public function index_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/project";
        if($dataid){$dirnameid="/".$dataid;}
       

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }

        if(empty($data['comment'])){
            $data['comment']= 0;
        }
        
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        $data['imageUrl']=str_replace("tem_upload", "upload/project".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $maxUrl=addslashes(htmlspecialchars($_POST["maxUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['maxUrl']=str_replace("tem_upload", "upload/project".$dirnameid, $maxUrl);
        $maxUrlArr=explode(",", $maxUrl);
        foreach ($maxUrlArr as $key => $value) {
            $imageData[1][$key]['imageUrl']=$value;
            $imageData[1][$key]['title']="maxUrl";
        }
       
        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["project_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"project",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"project",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

	//项目分类
    public function classify(){
        $dataData=$this->listLoad("project_classify","Project");
        $data=$this->getClassify("project_classify","0","","","0");
        $this->assign("data",$data);
        $this->display();
    } 
     public function classify_add(){
        $dataData=$this->listLoad("project_classify");
        $data=$this->displayClassify("project_classify");

        $this->assign('dataclassify',$data);
        $this->display("Project/classify_AE");
    }
    public function classify_editor(){
        $id=I("get.id");
        $dataData=$this->oneLoad("project_classify","Project","project_classify","project_classify_id",$id);
        $this->assign("data",$dataData);

        $data=$this->displayClassify("project_classify",$dataData['pid']);
        $this->assign('dataclassify',$data);
        $this->display("Project/classify_AE");

    }
    public function classify_Submit(){
        if(!IS_AJAX){U('Index/index');}
        if(!$this->loginBool()){return;}
        
        $dataid=I("POST.dataid");

        $data=I("POST.");
        //print_r($data);exit;
        $data['lastsavetime']=time();
        
        if(!empty($dataid)){
            $whereData["project_classify_id"]=$dataid;
            if($this->formEditorSubmit($data,"project_classify",$whereData)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddSubmit($data,"project_classify")){echo "1";}else{echo "0";}
        }
    }

}