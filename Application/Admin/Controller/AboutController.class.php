<?php 

namespace Admin\Controller;
use Think\Controller;
class AboutController extends BaseController{
	//光辉历程
    public function info(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"about_info","title"=>"光辉历程","model"=>"info","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        
        $this->assign('data',$dataData);

        $where['other_id']=1;
        $datas=$this->oneLoad("about_info","","other",$where,"");
        $this->assign('datas',$datas);

        $this->display();
    }
    public function info_add(){
        $dataData=$this->oneLoad("about_info","光辉历程");
        $this->display("About/info_AE");
    }
    public function info_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("about_info","光辉历程","info","info_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);
        $this->assign("data",$dataData);
        $this->display("About/info_AE");
    }
     public function info_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/info";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/info".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["info_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"info",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"info",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

     public function info1_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $data=$_POST;
        $data['other_id']=1;
        $whereData['other_id']=1;

      
        if($this->formEditorImageSubmits($data,"other",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";} 
    }

    //品牌介绍
    public function brand(){
        $where['brand_id']=1;
        $data=$this->oneLoad("about_factory","品牌介绍","brand",$where,"");
        $this->assign('data',$data);
        $this->display();
    }
     public function brand_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $data=$_POST;
        $data['brand_id']=1;
        $whereData['brand_id']=1;

        $dirnameid="";
        $dirname="Public/upload/brand";

        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        $data['imageUrl']=str_replace("tem_upload", "upload/brand".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $imageUrl1=addslashes(htmlspecialchars($_POST["imageUrl1"]));
        $data['imageUrl1']=str_replace("tem_upload", "upload/brand".$dirnameid, $imageUrl1);
        $imageData[1][0]['imageUrl']=$imageUrl1;
        $imageData[1][0]['title']="imageUrl1";

        $imageUrl2=addslashes(htmlspecialchars($_POST["imageUrl2"]));
        $data['imageUrl2']=str_replace("tem_upload", "upload/brand".$dirnameid, $imageUrl2);
        $imageData[2][0]['imageUrl']=$imageUrl2;
        $imageData[2][0]['title']="imageUrl2";

        if($this->formEditorImageSubmits($data,"brand",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";} 
    }

    //智能服务
    public function brand1(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"about_factory","title"=>"智能服务","model"=>"brand1","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function brand1_add(){
        $dataData=$this->oneLoad("about_factory","brand1");
        $this->display("About/brand1_AE");
    }
    public function brand1_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("about_factory","智能服务","brand1","brand1_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);
        $this->assign("data",$dataData);
        $this->display("About/brand1_AE");
    }
     public function brand1_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/brand1";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/brand1".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["brand1_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"brand1",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"brand1",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }
    
    //主要技术方案
    public function brand2(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"about_factory","title"=>"主要技术方案 ","model"=>"brand2","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function brand2_add(){
        $dataData=$this->oneLoad("about_factory","brand2");
        $this->display("About/brand2_AE");
    }
    public function brand2_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("about_factory","主要技术方案 ","brand2","brand2_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);
        $this->assign("data",$dataData);
        $this->display("About/brand2_AE");
    }
     public function brand2_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/brand2";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/brand2".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $imageUrl1=addslashes(htmlspecialchars($_POST["imageUrl1"]));
        $data['imageUrl1']=str_replace("tem_upload", "upload/brand2".$dirnameid, $imageUrl1);
        $imageData[1][0]['imageUrl']=$imageUrl1;
        $imageData[1][0]['title']="imageUrl1";


        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["brand2_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"brand2",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"brand2",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

    //十大核心竞争力
    public function brand3(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"about_factory","title"=>"十大核心竞争力","model"=>"brand3","whereData"=>$whereData,"orderData"=>"brand3_id asc","field"=>"showindex"));
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function brand3_add(){
        $dataData=$this->oneLoad("about_factory","十大核心竞争力");
        $this->display("About/brand3_AE");
    }
    public function brand3_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("about_factory","十大核心竞争力","brand3","brand3_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);
        $this->assign("data",$dataData);
        $this->display("About/brand3_AE");
    }
     public function brand3_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/brand3";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/brand3".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["brand3_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"brand3",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"brand3",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

    //企业文化
    public function culture(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"about_culture","title"=>"企业文化","model"=>"culture","whereData"=>$whereData,"orderData"=>"status desc,showtime desc","field"=>"showindex"));
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function culture_add(){
        $dataData=$this->oneLoad("about_factory","企业文化");
        $this->display("About/culture_AE");
    }
    public function culture_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("about_culture","企业文化","culture","culture_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $dataData['maxUrls']=explode(',',$dataData['maxUrl']);

        $this->assign("data",$dataData);

        $this->display("About/culture_AE");
    }
     public function culture_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/culture";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/culture".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $maxUrl=addslashes(htmlspecialchars($_POST["maxUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['maxUrl']=str_replace("tem_upload", "upload/culture".$dirnameid, $maxUrl);
        $maxUrlArr=explode(",", $maxUrl);
        foreach ($maxUrlArr as $key => $value) {
            $imageData[1][$key]['imageUrl']=$value;
            $imageData[1][$key]['title']="maxUrl";
        }

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["culture_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"culture",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"culture",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

    //荣誉资质
    public function honor(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"about_honor","title"=>"荣誉资质","model"=>"honor","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function honor_add(){
        $dataData=$this->oneLoad("about_honor","荣誉资质");
        $this->display("About/honor_AE");
    }
    public function honor_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("about_honor","荣誉资质","honor","honor_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $dataData['maxUrls']=explode(',',$dataData['maxUrl']);

        $this->assign("data",$dataData);

        $this->display("About/honor_AE");
    }
     public function honor_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/honor";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/honor".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $maxUrl=addslashes(htmlspecialchars($_POST["maxUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['maxUrl']=str_replace("tem_upload", "upload/honor".$dirnameid, $maxUrl);
        $maxUrlArr=explode(",", $maxUrl);
        foreach ($maxUrlArr as $key => $value) {
            $imageData[1][$key]['imageUrl']=$value;
            $imageData[1][$key]['title']="maxUrl";
        }

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["honor_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"honor",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"honor",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

    //作品视频
    public function video(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"about_video","title"=>"作品视频","model"=>"video","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function video_add(){
        $dataData=$this->oneLoad("about_video","作品视频");
        $this->display("About/video_AE");
    }
    public function video_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("about_video","作品视频","video","video_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $this->display("About/video_AE");
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