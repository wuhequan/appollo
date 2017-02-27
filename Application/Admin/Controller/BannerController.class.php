<?php 

namespace Admin\Controller;
use Think\Controller;
class BannerController extends BaseController{
     //首页
    public function index(){
        $dataData=$this->listLoad("banner_index","BANNER","banner_index");
        $this->assign('data',$dataData);
        $this->display();
    }
    public function index_add(){
        $dataData=$this->oneLoad("banner_index","BANNER");
        $this->display("Banner/index_AE");
    }
    public function index_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("banner_index","BANNER","banner_index","banner_index_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $this->display("Banner/index_AE");
    }
    public function index_submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));

        $dirnameid="";
        if($dataid){$dirnameid="/".$dataid;}
        $dirname="Public/upload/banner/index";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        
        $data['imageUrl']=str_replace("tem_upload", "upload/banner/index".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $avUrl=addslashes(htmlspecialchars($_POST["avUrl"]));
        $data['avUrl']=str_replace("tem_upload", "upload/banner/index".$dirnameid, $avUrl);
        $imageData[1][0]['imageUrl']=$avUrl;
        $imageData[1][0]['title']="avUrl";

        $avUrl1=addslashes(htmlspecialchars($_POST["avUrl1"]));
        $data['avUrl1']=str_replace("tem_upload", "upload/banner/index".$dirnameid, $avUrl1);
        $imageData[2][0]['imageUrl']=$avUrl1;
        $imageData[2][0]['title']="avUrl1";

        $data['content']=addslashes(htmlspecialchars($_POST["content"]));
        $data['title']=addslashes(htmlspecialchars($_POST["title"]));
        $data['url']=addslashes(htmlspecialchars($_POST["url"]));
        $data['sort']=addslashes(htmlspecialchars($_POST["sort"]));
        $data['version']=addslashes(htmlspecialchars($_POST["version"]));
        $data['info']=addslashes(htmlspecialchars($_POST["info"]));
        
        $data['lastsavetime']=time();

        
        //print_r($imageData);exit;
        
        if(!empty($dataid)){
            $whereData["banner_index_id"]=$dataid;
            if($this->formEditorImageSubmits($data,"banner_index",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmits($data,"banner_index",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }
    //公司文化
    public function culture(){
        $dataData=$this->listLoad("banner_culture","BANNER","banner_culture");
        $this->assign('data',$dataData);
    	$this->display();
	}
    public function culture_add(){
        $dataData=$this->oneLoad("banner_culture","BANNER");
        $this->display("Banner/culture_AE");
    }
    public function culture_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("banner_culture","BANNER","banner_culture","banner_culture_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $this->display("Banner/culture_AE");
    }
    public function culture_submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));

        $dirnameid="";
        $dirname="Public/upload/banner/culture";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/banner/culture".$dirnameid, $imageUrl);

        $data['content']=addslashes(htmlspecialchars($_POST["content"]));
        $data['title']=addslashes(htmlspecialchars($_POST["title"]));
        $data['url']=addslashes(htmlspecialchars($_POST["url"]));
        $data['sort']=addslashes(htmlspecialchars($_POST["sort"]));
        $data['lastsavetime']=time();

        
        $imageData[0]['imageUrl']=$imageUrl;
        $imageData[0]['title']="imageUrl";
        
        if(!empty($dataid)){
            $whereData["banner_culture_id"]=$dataid;
            if($this->formEditorImageSubmit($data,"banner_culture",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmit($data,"banner_culture",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }
    
    //新闻
    public function news(){
        $dataData=$this->listLoad("banner_news","BANNER","banner_news");
        $this->assign('data',$dataData);
        $this->display();
    }
    public function news_add(){
        $dataData=$this->oneLoad("banner_news","BANNER");
        $this->display("Banner/news_AE");
    }
    public function news_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("banner_news","BANNER","banner_news","banner_news_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $this->display("Banner/news_AE");
    }
    public function news_submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));

        $dirnameid="";
        $dirname="Public/upload/banner/news";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/banner/news".$dirnameid, $imageUrl);

        $data['content']=addslashes(htmlspecialchars($_POST["content"]));
        $data['title']=addslashes(htmlspecialchars($_POST["title"]));
        $data['url']=addslashes(htmlspecialchars($_POST["url"]));
        $data['sort']=addslashes(htmlspecialchars($_POST["sort"]));
        $data['lastsavetime']=time();

        
        $imageData[0]['imageUrl']=$imageUrl;
        $imageData[0]['title']="imageUrl";
        
        if(!empty($dataid)){
            $whereData["banner_news_id"]=$dataid;
            if($this->formEditorImageSubmit($data,"banner_news",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmit($data,"banner_news",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }
    
    //联系我们
    public function contact(){
        $dataData=$this->listLoad("banner_contact","BANNER","banner_contact");
        $this->assign('data',$dataData);
        $this->display();
    }
    public function contact_add(){
        $dataData=$this->oneLoad("banner_contact","BANNER");
        $this->display("Banner/contact_AE");
    }
    public function contact_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("banner_contact","BANNER","banner_contact","banner_contact_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $this->display("Banner/contact_AE");
    }
    public function contact_submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));

        $dirnameid="";
        $dirname="Public/upload/banner/contact";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/banner/contact".$dirnameid, $imageUrl);

        $data['content']=addslashes(htmlspecialchars($_POST["content"]));
        $data['title']=addslashes(htmlspecialchars($_POST["title"]));
        $data['url']=addslashes(htmlspecialchars($_POST["url"]));
        $data['sort']=addslashes(htmlspecialchars($_POST["sort"]));
        $data['lastsavetime']=time();
        
        $imageData[0]['imageUrl']=$imageUrl;
        $imageData[0]['title']="imageUrl";
        
        if(!empty($dataid)){
            $whereData["banner_contact_id"]=$dataid;
            if($this->formEditorImageSubmit($data,"banner_contact",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmit($data,"banner_contact",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }
 
    //产品中心
    public function product(){
        $dataData=$this->listLoad("banner_product","BANNER","banner_product");
        $this->assign('data',$dataData);
        $this->display();
    }
    public function product_add(){
        $dataData=$this->oneLoad("banner_product","BANNER");
        $this->display("Banner/product_AE");
    }
    public function product_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("banner_product","BANNER","banner_product","banner_product_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $this->display("Banner/product_AE");
    }
    public function product_submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));

        $dirnameid="";
        $dirname="Public/upload/banner/product";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/banner/product".$dirnameid, $imageUrl);

        $data['content']=addslashes(htmlspecialchars($_POST["content"]));
        $data['title']=addslashes(htmlspecialchars($_POST["title"]));
        $data['url']=addslashes(htmlspecialchars($_POST["url"]));
        $data['sort']=addslashes(htmlspecialchars($_POST["sort"]));
        $data['lastsavetime']=time();
        
        $imageData[0]['imageUrl']=$imageUrl;
        $imageData[0]['title']="imageUrl";
        
        if(!empty($dataid)){
            $whereData["banner_product_id"]=$dataid;
            if($this->formEditorImageSubmit($data,"banner_product",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmit($data,"banner_product",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }   

    //项目中心
    public function project(){
        $dataData=$this->listLoad("banner_project","BANNER","banner_project");
        $this->assign('data',$dataData);
        $this->display();
    }
    public function project_add(){
        $dataData=$this->oneLoad("banner_project","BANNER");
        $this->display("Banner/project_AE");
    }
    public function project_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("banner_project","BANNER","banner_project","banner_project_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $this->display("Banner/project_AE");
    }
    public function project_submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));

        $dirnameid="";
        $dirname="Public/upload/banner/project";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/banner/project".$dirnameid, $imageUrl);

        $data['content']=addslashes(htmlspecialchars($_POST["content"]));
        $data['title']=addslashes(htmlspecialchars($_POST["title"]));
        $data['url']=addslashes(htmlspecialchars($_POST["url"]));
        $data['sort']=addslashes(htmlspecialchars($_POST["sort"]));
        $data['lastsavetime']=time();
        
        $imageData[0]['imageUrl']=$imageUrl;
        $imageData[0]['title']="imageUrl";
        
        if(!empty($dataid)){
            $whereData["banner_project_id"]=$dataid;
            if($this->formEditorImageSubmit($data,"banner_project",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmit($data,"banner_project",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

    //会展中心
    public function exhibition(){
        $dataData=$this->listLoad("banner_exhibition","BANNER","banner_exhibition");
        $this->assign('data',$dataData);
        $this->display();
    }
    public function exhibition_add(){
        $dataData=$this->oneLoad("banner_exhibition","BANNER");
        $this->display("Banner/exhibition_AE");
    }
    public function exhibition_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("banner_exhibition","BANNER","banner_exhibition","banner_exhibition_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $this->display("Banner/exhibition_AE");
    }
    public function exhibition_submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));

        $dirnameid="";
        $dirname="Public/upload/banner/exhibition";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/banner/exhibition".$dirnameid, $imageUrl);

        $data['content']=addslashes(htmlspecialchars($_POST["content"]));
        $data['title']=addslashes(htmlspecialchars($_POST["title"]));
        $data['etitle']=addslashes(htmlspecialchars($_POST["etitle"]));
        $data['url']=addslashes(htmlspecialchars($_POST["url"]));
        $data['sort']=addslashes(htmlspecialchars($_POST["sort"]));
        $data['lastsavetime']=time();
        
        $imageData[0]['imageUrl']=$imageUrl;
        $imageData[0]['title']="imageUrl";
        
        if(!empty($dataid)){
            $whereData["banner_exhibition_id"]=$dataid;
            if($this->formEditorImageSubmit($data,"banner_exhibition",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmit($data,"banner_exhibition",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

    //人才招聘
    public function job(){
        $dataData=$this->listLoad("banner_job","BANNER","banner_job");
        $this->assign('data',$dataData);
        $this->display();
    }
    public function job_add(){
        $dataData=$this->oneLoad("banner_job","BANNER");
        $this->display("Banner/job_AE");
    }
    public function job_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("banner_job","BANNER","banner_job","banner_job_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $this->display("Banner/job_AE");
    }
    public function job_submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));

        $dirnameid="";
        $dirname="Public/upload/banner/job";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/banner/job".$dirnameid, $imageUrl);

        $data['content']=addslashes(htmlspecialchars($_POST["content"]));
        $data['title']=addslashes(htmlspecialchars($_POST["title"]));
        $data['url']=addslashes(htmlspecialchars($_POST["url"]));
        $data['sort']=addslashes(htmlspecialchars($_POST["sort"]));
        $data['lastsavetime']=time();
        
        $imageData[0]['imageUrl']=$imageUrl;
        $imageData[0]['title']="imageUrl";
        
        if(!empty($dataid)){
            $whereData["banner_job_id"]=$dataid;
            if($this->formEditorImageSubmit($data,"banner_job",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmit($data,"banner_job",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

    //客户专区
    public function vip(){
        $dataData=$this->listLoad("banner_vip","BANNER","banner_vip");
        $this->assign('data',$dataData);
        $this->display();
    }
    public function vip_add(){
        $dataData=$this->oneLoad("banner_vip","BANNER");
        $this->display("Banner/vip_AE");
    }
    public function vip_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("banner_vip","BANNER","banner_vip","banner_vip_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $this->display("Banner/vip_AE");
    }
    public function vip_submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));

        $dirnameid="";
        $dirname="Public/upload/banner/vip";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/banner/vip".$dirnameid, $imageUrl);

        $data['content']=addslashes(htmlspecialchars($_POST["content"]));
        $data['title']=addslashes(htmlspecialchars($_POST["title"]));
        $data['url']=addslashes(htmlspecialchars($_POST["url"]));
        $data['sort']=addslashes(htmlspecialchars($_POST["sort"]));
        $data['lastsavetime']=time();
        
        $imageData[0]['imageUrl']=$imageUrl;
        $imageData[0]['title']="imageUrl";
        
        if(!empty($dataid)){
            $whereData["banner_vip_id"]=$dataid;
            if($this->formEditorImageSubmit($data,"banner_vip",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmit($data,"banner_vip",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }

    //体验与创新
    public function experience(){
        $dataData=$this->listLoad("banner_experience","BANNER","banner_experience");
        $this->assign('data',$dataData);
        $this->display();
    }
    public function experience_add(){
        $dataData=$this->oneLoad("banner_experience","BANNER");
        $this->display("Banner/experience_AE");
    }
    public function experience_editor(){
        $dataid=addslashes(htmlspecialchars($_GET["id"]));
        $dataData=$this->oneLoad("banner_experience","BANNER","banner_experience","banner_experience_id",$dataid);
        $dataData["showtime"]=date('Y-m-d',$dataData["showtime"]);

        $this->assign("data",$dataData);

        $this->display("Banner/experience_AE");
    }
    public function experience_submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $dataid=addslashes(htmlspecialchars($_POST["dataid"]));

        $dirnameid="";
        $dirname="Public/upload/banner/experience";
        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        if($dataid){$dirnameid="/".$dataid;}
        $data['imageUrl']=str_replace("tem_upload", "upload/banner/experience".$dirnameid, $imageUrl);

        $data['content']=addslashes(htmlspecialchars($_POST["content"]));
        $data['title']=addslashes(htmlspecialchars($_POST["title"]));
        $data['url']=addslashes(htmlspecialchars($_POST["url"]));
        $data['sort']=addslashes(htmlspecialchars($_POST["sort"]));
        $data['lastsavetime']=time();
        
        $imageData[0]['imageUrl']=$imageUrl;
        $imageData[0]['title']="imageUrl";
        
        if(!empty($dataid)){
            $whereData["banner_experience_id"]=$dataid;
            if($this->formEditorImageSubmit($data,"banner_experience",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";}
        }else{
            $data['createtime']=time();
            $data['status']=1;
            if($this->formAddImageSubmit($data,"banner_experience",$imageData,$dirname)){echo "1";}else{echo "0";}
        }
    }
}