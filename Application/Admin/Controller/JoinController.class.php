<?php 

namespace Admin\Controller;
use Think\Controller;
class JoinController extends BaseController{

	//招商加盟
    public function join(){
        $where['join_id']=1;
        $data=$this->oneLoad("join_join","招商加盟","join",$where,"");
        $data['maxUrls']=explode(',',$data['maxUrl']);
        $this->assign('data',$data);

        $comment=$this->clistLoad("join_join","招商加盟","comment",$whereCom,"createtime desc");
        $this->assign("comment",$comment);
        $this->display();
    }
    public function comment(){
        $id=I('get.comment_id');
        $data=M('comment')->where('comment_id='.$id)->find();
        $this->assign("data",$data);
        $this->display();
    }
     public function join_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $data=$_POST;
        $data['join_id']=1;
        $whereData['join_id']=1;

        $dirnameid="";
        $dirname="Public/upload/join";

        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        $data['imageUrl']=str_replace("tem_upload", "upload/join".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $imageUrl1=addslashes(htmlspecialchars($_POST["imageUrl1"]));
        $data['imageUrl1']=str_replace("tem_upload", "upload/join".$dirnameid, $imageUrl1);
        $imageData[1][0]['imageUrl']=$imageUrl1;
        $imageData[1][0]['title']="imageUrl1";

        $imageUrl2=addslashes(htmlspecialchars($_POST["imageUrl2"]));
        $data['imageUrl2']=str_replace("tem_upload", "upload/join".$dirnameid, $imageUrl2);
        $imageData[2][0]['imageUrl']=$imageUrl2;
        $imageData[2][0]['title']="imageUrl2";

        $maxUrl=addslashes(htmlspecialchars($_POST["maxUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['maxUrl']=str_replace("tem_upload", "upload/join".$dirnameid, $maxUrl);
        $maxUrlArr=explode(",", $maxUrl);
        foreach ($maxUrlArr as $key => $value) {
            $imageData[3][$key]['imageUrl']=$value;
            $imageData[3][$key]['title']="maxUrl";
        }

        if($this->formEditorImageSubmits($data,"join",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";} 
    }

	//十大保障
    public function safeguard(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"join_safeguard","title"=>"十大保障 ","model"=>"safeguard","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function safeguard_add(){
        $dataData=$this->oneLoad("join_safeguard","safeguard");
        $this->display("Join/safeguard_AE");
    }
    public function safeguard_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("join_safeguard","十大保障 ","safeguard","safeguard_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);
        $this->assign("data",$dataData);
        $this->display("Join/safeguard_AE");
    }
     public function safeguard_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/safeguard";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/safeguard".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["safeguard_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"safeguard",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"safeguard",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

    //十大优势
    public function advantage(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"join_advantage","title"=>"十大优势 ","model"=>"advantage","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function advantage_add(){
        $dataData=$this->oneLoad("join_advantage","advantage");
        $this->display("Join/advantage_AE");
    }
    public function advantage_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("join_advantage","十大优势 ","advantage","advantage_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);
        $this->assign("data",$dataData);
        $this->display("Join/advantage_AE");
    }
     public function advantage_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/advantage";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/advantage".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["advantage_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"advantage",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"advantage",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }


    //十大政策
    public function policy(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"join_policy","title"=>"十大政策 ","model"=>"policy","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        
        $this->assign('data',$dataData);

        $this->display();
    }
    public function policy_add(){
        $dataData=$this->oneLoad("join_policy","policy");
        $this->display("Join/policy_AE");
    }
    public function policy_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("join_policy","十大政策 ","policy","policy_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);
        $this->assign("data",$dataData);
        $this->display("Join/policy_AE");
    }
     public function policy_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/policy";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));

        if(empty($data['status'])){
            $data['status']= 0;
        }
        if(empty($data['showindex'])){
            $data['showindex']= 0;
        }
    
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/policy".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

        if(!empty($dataid)){
            $whereData["policy_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"policy",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"policy",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }
}