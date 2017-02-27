<?php 

namespace Admin\Controller;
use Think\Controller;
class SiteController extends BaseController
{
    public function waters(){
        $dataData=$this->oneLoad("site_waters","水印","site_watres","site_watres_id",1);
        $this->assign("data",$dataData);
        //print_r($dataData);
        //print_r($_SESSION['waterurl']);
        $this->display();
    }
    public function waters_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        $data=I("post.");
        $dataid="1";
        $dirnameid="";
        $dirname="Public/upload/Site/waters";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/Site/waters".$dirnameid, $imageUrl);
        $imageData[0]['imageUrl']=$imageUrl;
        $imageData[0]['title']="imageUrl";

        $data['degree']=intval($data['degree']);
        //print_r($imageData);exit;
        $whereData["site_watres_id"]=$dataid;
        if($this->formEditorImageSubmit($data,"site_watres",$whereData,$imageData,$dirname,"0")){echo "1";}else{echo "0";}

    }
    /*meta*/
    public function meta(){
        $dataData=$this->listLoad("site_meta","SITE","site_meta");
        $navTopM=M("nav_top");
        foreach ($dataData as $key => $value) {
            $dataData[$key]["name"]=$navTopM->where(array("nav_top_id"=>$value["nav_top_id"]))->find();
        }
        //print_r($dataData);
        $this->assign('data',$dataData);
        $this->display();
       
    }

    public function meta_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data['headtitle']=addslashes(htmlspecialchars($_POST["headtitle"]));
        $data['keywords']=addslashes(htmlspecialchars($_POST["keywords"]));
        $data['description']=addslashes(htmlspecialchars($_POST["description"]));
        $data['searchtitle']=addslashes(htmlspecialchars($_POST["searchtitle"]));
        $data['author']=addslashes(htmlspecialchars($_POST["author"]));
        $data['copyright']=addslashes(htmlspecialchars($_POST["copyright"]));

        

        $whereData["site_meta_id"]=$dataid;

        if($this->formEditorSubmit($data,"site_meta",$whereData)){
            echo "1";
        }else{
            echo "0";
        }
        
        
    }

    //友情链接
    public function friend(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"about_factory","title"=>"友情链接","model"=>"friend","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function friend_add(){
        $dataData=$this->oneLoad("about_factory","friend");
        $this->display("Site/friend_AE");
    }
    public function friend_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("about_factory","友情链接","friend","friend_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);
        $this->assign("data",$dataData);
        $this->display("Site/friend_AE");
    }
     public function friend_Submit(){
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
            $whereData["friend_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"friend",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"friend",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }
    


	
}
	









?>