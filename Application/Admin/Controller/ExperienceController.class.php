<?php 

namespace Admin\Controller;
use Think\Controller;
class ExperienceController extends BaseController{

    //体验与创新
    public function product(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"experience_product","title"=>"体验与创新","model"=>"experience","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));

        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function product_add(){
        $dataData=$this->oneLoad("experience_product","体验与创新");
        $this->display("Experience/product_AE");
    }
    public function product_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("experience_product","体验与创新","experience","experience_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);
        $dataData['maxUrls']=explode(',',$dataData['maxUrl']);

        $this->assign("data",$dataData);


        $this->display("Experience/product_AE");
    }
     public function product_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/experience";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/experience".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

       

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["experience_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"experience",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"experience",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

    //作品视频
    public function video(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"experience_video","title"=>"体验与创新","model"=>"video","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function video_add(){
        $dataData=$this->oneLoad("experience_video","体验与创新");
        $this->display("Experience/video_AE");
    }
    public function video_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("experience_video","体验与创新","video","video_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $this->display("Experience/video_AE");
    }
     public function video_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/video";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/video".$dirnameid, $imageUrl);
        $imageData[2][0]['imageUrl']=$imageUrl;
        $imageData[2][0]['title']="imageUrl";

        $avUrl=addslashes(htmlspecialchars($_POST["avUrl"]));
        $data['avUrl']=str_replace("tem_upload", "upload/video".$dirnameid, $avUrl);
        $imageData[0][0]['imageUrl']=$avUrl;
        $imageData[0][0]['title']="avUrl";



        $avUrl1=addslashes(htmlspecialchars($_POST["avUrl1"]));
        $data['avUrl1']=str_replace("tem_upload", "upload/video".$dirnameid, $avUrl1);
        $imageData[1][0]['imageUrl']=$avUrl1;
        $imageData[1][0]['title']="avUrl1";



  
        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

       
        
        
        if(!empty($dataid)){
            $whereData["video_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"video",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"video",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

    
    
    
}