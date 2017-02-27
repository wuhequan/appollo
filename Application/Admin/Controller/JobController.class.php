<?php 

namespace Admin\Controller;
use Think\Controller;
class JobController extends BaseController{


	//人才招聘
    public function job(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"job_job","title"=>"人才招聘","model"=>"job","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        
        $this->assign('data',$dataData);

        $where['others_id']=1;
        $datas=$this->oneLoad("job_job","人才招聘","others",$where,"");
        $this->assign('datas',$datas);

        $this->display();
    }
    public function job_add(){
        $dataData=$this->oneLoad("job_job","人才招聘");
        $this->display("Job/job_AE");
    }
    public function job_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("job_job","人才招聘","job","job_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);
        $this->assign("data",$dataData);
        $this->display("Job/job_AE");
    }
     public function job_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/job";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/job".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["job_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"job",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"job",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

     public function job1_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $data=$_POST;
        $data['others_id']=1;
        $whereData['others_id']=1;

      
        if($this->formEditorImageSubmits($data,"others",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";} 
    }


}