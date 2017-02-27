<?php 

namespace Admin\Controller;
use Think\Controller;
class PressController extends BaseController{

    //新闻
    public function index(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"press_index","title"=>"News","model"=>"news","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        $classifyM=M("news_classify");
        $classifyData=$this->listClassify("news_classify");
        foreach ($dataData as $key => $value) {
            foreach ($classifyData as $key1 => $value1) {
                if($value['news_classify_id']==$value1['news_classify_id']){
                    $dataData[$key]["classify"]=$value1["title"];
                    continue;
                }
            }
           
        }
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function index_add(){
        $dataData=$this->oneLoad("press_index","News");

        $classify=$this->displayClassify("news_classify","",$dataData['news_classify_id'],"classify");
        $this->assign("dataclassify",$classify);

        $this->display("Press/index_AE");
    }
    public function index_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("press_index","News","news","news_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);
        $dataData['maxUrls']=explode(',',$dataData['maxUrl']);

        $this->assign("data",$dataData);

        $classify=$this->displayClassify("news_classify","",$dataData['news_classify_id'],"classify");
        $this->assign("dataclassify",$classify);

        $this->display("Press/index_AE");
    }
     public function index_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/news";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/news".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

       

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["news_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"news",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"news",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

     //新闻分类
    public function classify(){
        $dataData=$this->listLoad("press_classify","新闻分类");
        $data=$this->getClassify("news_classify","0","","","0");
        $this->assign("data",$data);
        $this->display();
    } 
     public function classify_add(){
        $dataData=$this->listLoad("press_classify");
        $data=$this->displayClassify("news_classify");

        $this->assign('dataclassify',$data);
        $this->display("Press/classify_AE");
    }
    public function classify_editor(){
        $id=I("get.id");
        $dataData=$this->oneLoad("press_classify","新闻分类","news_classify","news_classify_id",$id);
        $this->assign("data",$dataData);

        $data=$this->displayClassify("news_classify",$dataData['pid']);
        $this->assign('dataclassify',$data);
        $this->display("Press/classify_AE");

    }
    public function classify_Submit(){
        if(!IS_AJAX){U('Index/index');}
        if(!$this->loginBool()){return;}
        
        $dataid=I("POST.dataid");

        $data=I("POST.");
        //print_r($data);exit;
        $data['lastsavetime']=time();
        
        if(!empty($dataid)){
            $whereData["news_classify_id"]=$dataid;
            if($this->formEditorSubmit($data,"news_classify",$whereData)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddSubmit($data,"news_classify")){echo "1";}else{echo "0";}
        }
    }

    //公司视频
    public function video1(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"press_video1","title"=>"公司视频","model"=>"video1","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function video1_add(){
        $dataData=$this->oneLoad("press_video1","公司视频");
        $this->display("Press/video1_AE");
    }
    public function video1_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("press_video1","公司视频","video1","video1_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $this->display("Press/video1_AE");
    }
     public function video1_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/video1";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/video1".$dirnameid, $imageUrl);
        $imageData[2][0]['imageUrl']=$imageUrl;
        $imageData[2][0]['title']="imageUrl";

        $avUrl=addslashes(htmlspecialchars($_POST["avUrl"]));
        $data['avUrl']=str_replace("tem_upload", "upload/video1".$dirnameid, $avUrl);
        $imageData[0][0]['imageUrl']=$avUrl;
        $imageData[0][0]['title']="avUrl";



        $avUrl1=addslashes(htmlspecialchars($_POST["avUrl1"]));
        $data['avUrl1']=str_replace("tem_upload", "upload/video1".$dirnameid, $avUrl1);
        $imageData[1][0]['imageUrl']=$avUrl1;
        $imageData[1][0]['title']="avUrl1";



  
        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

       
        
        
        if(!empty($dataid)){
            $whereData["video1_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"video1",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"video1",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }
    
    
    
}