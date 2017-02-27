<?php 

namespace Admin\Controller;
use Think\Controller;
class ProductController extends BaseController
{
    //产品列表
    public function index (){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"product_index","title"=>"Product","model"=>"product","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"product_classify_id,showindex"));
        $classifyM=M("product_classify");
        $classifyData=$this->listClassify("product_classify");
        foreach ($dataData as $key => $value) {
            foreach ($classifyData as $key1 => $value1) {
                if($value['product_classify_id']==$value1['product_classify_id']){
                    $dataData[$key]["classify"]=$value1["title"];
                    continue;
                }
            }
           
        }
        $this->assign('data',$dataData);

        $this->display();
    } 
    public function add(){
        $dataData=$this->oneLoad("product_index","产品");

        $classify=$this->displayClassify("product_classify","","","classify");
        $this->assign("dataclassify",$classify);



        
        $this->display("Product/index_AE");
    }
    public function editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("product_index","产品","product","product_id",$dataid);
        $dataData['product_material_id']=explode(',', $dataData['product_material_id']);
       
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $classify=$this->displayClassify("product_classify","",$dataData['product_classify_id'],"classify");
        $this->assign("dataclassify",$classify);

        $dataData['maxUrls']=explode(',',$dataData['maxUrl']);
        $dataData['maxUrls1']=explode(',',$dataData['maxUrl1']);
        $dataData['maxUrls3']=explode(',',$dataData['maxUrl3']);
        
        $this->assign("data",$dataData);
        


        $this->display("Product/index_AE");
    }
 
    public function index_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/product";
        if($dataid){$dirnameid="/".$dataid;}
       

        
        
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        $data['imageUrl']=str_replace("tem_upload", "upload/product".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $maxUrl=addslashes(htmlspecialchars($_POST["maxUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['maxUrl']=str_replace("tem_upload", "upload/product".$dirnameid, $maxUrl);
        $maxUrlArr=explode(",", $maxUrl);
        foreach ($maxUrlArr as $key => $value) {
            $imageData[1][$key]['imageUrl']=$value;
            $imageData[1][$key]['title']="maxUrl";
        }

        $maxUrl1=addslashes(htmlspecialchars($_POST["maxUrl1"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['maxUrl1']=str_replace("tem_upload", "upload/product".$dirnameid, $maxUrl1);
        $maxUrlArr=explode(",", $maxUrl1);
        foreach ($maxUrlArr as $key => $value) {
            $imageData[2][$key]['imageUrl']=$value;
            $imageData[2][$key]['title']="maxUrl1";
        }

        $maxUrl3=addslashes(htmlspecialchars($_POST["maxUrl3"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['maxUrl3']=str_replace("tem_upload", "upload/product".$dirnameid, $maxUrl3);
        $maxUrlArr=explode(",", $maxUrl3);
        foreach ($maxUrlArr as $key => $value) {
            $imageData[3][$key]['imageUrl']=$value;
            $imageData[3][$key]['title']="maxUrl3";
        }

        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();
        $data['product_material_id']=','.$data['product_material_id'];

        
        
        if(!empty($dataid)){
            $whereData["product_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"product",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"product",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }
    
   
    //产品分类
    public function classify(){
        $dataData=$this->listLoad("product_classify","Product");
        $data=$this->getClassify("product_classify","0","","","0");
        $this->assign("data",$data);
        $this->display();
    } 
     public function classify_add(){
        $dataData=$this->listLoad("product_classify","Product");
        $data=$this->displayClassify("product_classify");

        $this->assign('dataclassify',$data);
        $this->display("Product/classify_AE");
    }
    public function classify_editor(){
        $id=I("get.id");
        $dataData=$this->oneLoad("product_classify","Product","product_classify","product_classify_id",$id);
        $this->assign("data",$dataData);

        $data=$this->displayClassify("product_classify",0,$dataData['pid']);
        $this->assign('dataclassify',$data);
        $this->display("Product/classify_AE");

    }
    public function classify_Submit(){
        if(!IS_AJAX){U('Index/index');}
        if(!$this->loginBool()){return;}
        
        $dataid=I("POST.dataid");

        $data=I("POST.");
        //print_r($data);exit;
        $data['lastsavetime']=time();
        
        if(!empty($dataid)){
            $whereData["product_classify_id"]=$dataid;
            if($this->formEditorSubmit($data,"product_classify",$whereData)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddSubmit($data,"product_classify")){echo "1";}else{echo "0";}
        }
    }
    //产品材质
     public function material(){
        $dataData=$this->listLoad("product_material","Product");
        $data=$this->getClassify("product_material","0","","","0");
        $this->assign("data",$data);
        $this->display();
    } 
     public function material_add(){
        $dataData=$this->listLoad("product_material");
        $data=$this->displayClassify("product_material");

        $this->assign('datamaterial',$data);
        $this->display("Product/material_AE");
    }
    public function material_editor(){
        $id=I("get.id");
        $dataData=$this->oneLoad("product_material","Product","product_material","product_material_id",$id);
        $this->assign("data",$dataData);

        $data=$this->displayClassify("product_material",$dataData['pid']);
        $this->assign('datamaterial',$data);
        $this->display("Product/material_AE");

    }
    public function material_Submit(){
        if(!IS_AJAX){U('Index/index');}
        if(!$this->loginBool()){return;}
        
        $dataid=I("POST.dataid");

        $data=I("POST.");
        //print_r($data);exit;
        $data['lastsavetime']=time();
        
        if(!empty($dataid)){
            $whereData["product_material_id"]=$dataid;
            if($this->formEditorSubmit($data,"product_material",$whereData)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddSubmit($data,"product_material")){echo "1";}else{echo "0";}
        }
    }
    //产品系列
    public function series(){
        $showindex=addslashes(htmlspecialchars($_GET["showindex"]));
        if($showindex)$whereData["showindex"]=$showindex;
        $dataData=$this->listLoadopo(array("nav"=>"product_series","title"=>"产品系列","model"=>"series","whereData"=>$whereData,"orderData"=>"showtime desc","field"=>"showindex"));
        $this->assign('data',$dataData);

        $this->display();
    } 
    public function series_add(){
        $dataData=$this->oneLoad("product_series","产品系列");
        $this->display("Product/series_AE");
    }
    public function series_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("product_series","产品系列","series","series_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

     

        $dataData['maxUrls']=explode(',',$dataData['maxUrl']);
        $dataData['maxUrls1']=explode(',',$dataData['maxUrl1']);

        $this->assign("data",$dataData);
        //print_r($dataData0);

        $this->display("Product/series_AE");
    }
 
    public function series_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));
        $data=I("post.");

        $dirnameid="";
        $dirname="Public/upload/series";
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
        $data['imageUrl']=str_replace("tem_upload", "upload/series".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

         $maxUrl=addslashes(htmlspecialchars($_POST["maxUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['maxUrl']=str_replace("tem_upload", "upload/series".$dirnameid, $maxUrl);
        $maxUrlArr=explode(",", $maxUrl);
        foreach ($maxUrlArr as $key => $value) {
            $imageData[1][$key]['imageUrl']=$value;
            $imageData[1][$key]['title']="maxUrl";
        }

        $maxUrl1=addslashes(htmlspecialchars($_POST["maxUrl1"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['maxUrl1']=str_replace("tem_upload", "upload/series".$dirnameid, $maxUrl1);
        $maxUrlArr=explode(",", $maxUrl1);
        foreach ($maxUrlArr as $key => $value) {
            $imageData[2][$key]['imageUrl']=$value;
            $imageData[2][$key]['title']="maxUrl1";
        }

      
        $data['showtime']=strtotime($_POST["showtime"]);
        if($data['showtime']){}else{$data['showtime']=time();}
        $data['lastsavetime']=time();

      
        
        
        if(!empty($dataid)){
            $whereData["series_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"series",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"series",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

}
    

    






?>