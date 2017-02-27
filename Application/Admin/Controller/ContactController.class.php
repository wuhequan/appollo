<?php 

namespace Admin\Controller;
use Think\Controller;
class ContactController extends BaseController{

    public function contact(){
        $where['contact_id']=1;
        $data=$this->oneLoad("contact_contact","联系我们","contact",$where,"");
        $this->assign('data',$data);
        $this->display();
    }
     public function contact_Submit(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $data=$_POST;
        $data['contact_id']=1;
        $whereData['contact_id']=1;

        $dirnameid="";
        $dirname="Public/upload/contact";

        $imageUrl=addslashes(htmlspecialchars($_POST["imageUrl"]));
        $data['imageUrl']=str_replace("tem_upload", "upload/contact".$dirnameid, $imageUrl);
        $imageData[0][0]['imageUrl']=$imageUrl;
        $imageData[0][0]['title']="imageUrl";

        $imageUrl1=addslashes(htmlspecialchars($_POST["imageUrl1"]));
        $data['imageUrl1']=str_replace("tem_upload", "upload/contact".$dirnameid, $imageUrl1);
        $imageData[1][0]['imageUrl']=$imageUrl1;
        $imageData[1][0]['title']="imageUrl1";

        $imageUrl2=addslashes(htmlspecialchars($_POST["imageUrl2"]));
        $data['imageUrl2']=str_replace("tem_upload", "upload/contact".$dirnameid, $imageUrl2);
        $imageData[2][0]['imageUrl']=$imageUrl2;
        $imageData[2][0]['title']="imageUrl2";

        if($this->formEditorImageSubmits($data,"contact",$whereData,$imageData,$dirname)){echo "1";}else{echo "0";} 
    }

}