<?php 

namespace Admin\Controller;
use Think\Controller;
class PublicController extends BaseController
{
    /*删除商品*/
    public function del(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
        $model=addslashes(htmlspecialchars($_POST["model"]));
        $idname=addslashes(htmlspecialchars($_POST["id_name"]));
        $id=addslashes(htmlspecialchars($_POST["id"]));
        $judge=addslashes(htmlspecialchars($_POST["judge"]));

        $dataM=M($model);
        $dataData=$dataM->where(array($idname=>$id))->find();
        if($judge){
            $judgeData=$dataM->where(array('pid'=>$id))->find();
        }
        //print_r($judgeData);

        if(empty($judgeData)&&$dataM->where(array($idname=>$id))->delete()){
            if($dataData["imageUrl"]){
                $imageUrl=str_replace("/Public", "Public",$dataData["imageUrl"]);
                unlink($imageUrl);
            }
            echo "1";
        }else{
            echo "0";
        }
    }
    public function del_cache() { 
        header("Content-type: text/html; charset=utf-8");
        //清文件缓存
        $dirs = array('./'.APP_NAME.'/Runtime/');
        //清理缓存
        foreach($dirs as $value) {
            $this->rmdirr($value);
        }
        @mkdir('./'.APP_NAME.'/Runtime/',0777,true);
        $this->success('系统缓存清除成功！' ,U ('Admin/Index/index'));
    } 
    public function del_img() { 
        header("Content-type: text/html; charset=utf-8");
        //清文件缓存
        $dirs = array('./Public/tem_upload/');
        //清理缓存
        foreach($dirs as $value) {
            $this->rmdirr($value);
        }
         @mkdir('./Public/tem_upload/',0777,true);
        $this->success('用户上传垃圾图片清除成功！' ,U ('Admin/Index/index'));
    } 
    //递归清楚文件
    public function rmdirr($dirname) {
        if (!file_exists($dirname)) {
            return false;
        }
        if (is_file($dirname) || is_link($dirname)) {
            return unlink($dirname);
        }
        $dir = dir($dirname);
        if($dir){
            while (false !== $entry = $dir->read()) {
                if ($entry == '.' || $entry == '..') {
                    continue;
                }
                //递归
                $this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
            }
        }
        $dir->close();
        return rmdir($dirname);
    }

    /*切换状态*/
    public function changeStatus(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
    
        $model=addslashes(htmlspecialchars($_POST["model"]));
        $idname=addslashes(htmlspecialchars($_POST["id_name"]));
        $id=addslashes(htmlspecialchars($_POST["id"]));
        $statusname=addslashes(htmlspecialchars($_POST["statusname"]));
        $status=addslashes(htmlspecialchars($_POST["status"])); 
        $dataM=M($model);
        
        if($dataM->where(array($idname=>$id))->save(array($statusname=>$status))){
            $data1=$dataM->where(array($idname=>$id))->find();
            echo $data1[$statusname];
        }else{
            echo "404-".$status;
           
        }
    }
    /*局部更新信息*/
    public function changeValue(){
        if(!IS_AJAX) _404('页面不存在',U('Index/index'));
        if(!$this->loginBool()){return;}
    
        $model=addslashes(htmlspecialchars($_POST["model"]));
        $idname=addslashes(htmlspecialchars($_POST["id_name"]));
        $id=addslashes(htmlspecialchars($_POST["id"]));
        $valuename=addslashes(htmlspecialchars($_POST["value_name"]));
        $value=addslashes(htmlspecialchars($_POST["value"]));
        $dataM=M($model);
        
        if($dataM->where(array($idname=>$id))->save(array($valuename=>$value))){
            $data1=$dataM->where(array($idname=>$id))->find();
            echo $data1[$valuename];
        }else{
            echo "404";
        }
    }
    /*上传图片*/
    public function uploadify($targetFolder)
    {

        $verifyToken = md5('unique_salt' . $_POST['timestamp']);
        $fileParts = pathinfo($_FILES['Filedata']['name']);
        $type=$fileParts['extension'];
        //print_r($fileParts['basename']);
        $phpname=addslashes(htmlspecialchars($fileParts['basename']));
        
        if(is_numeric(strpos($phpname,'.php'))){
            echo "0";
            exit;
        }
        
        if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            //设置文件名字
            $filename=md5(time().rand());
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $targetFile = rtrim($targetPath) . '/' . $filename.'.'.$type;
            
            $fileTypes = array('jpg','jpeg','gif','png','exe','pdf','zip','doc','sql','xls','html','ppt','docx','xlsx','pptx',"AVI","wma","rmvb","rm","flash","mp4","mid","3GP","WebM","webm"); // File extensions
            if (in_array($fileParts['extension'],$fileTypes)) {
                move_uploaded_file($tempFile,$targetFile);
                //$this->water('.'.$targetFolder. '/' . $filename.'.'.$type);
                echo $targetFolder. '/' . $filename.'.'.$type;

            } else {
                echo '0';
            }
        }
    }

    
    //上传图片
    public function uploadImg(){

        $targetFolder="/Public/tem_upload";
        $this->uploadify($targetFolder);
    }

    
    //添加页面加载
    public function add(){
        if($this->loginBool()){
            $title=addslashes(htmlspecialchars($_GET["title"]));
            $typeAction=addslashes(htmlspecialchars($_GET["action"]));
            $typeTpl=addslashes(htmlspecialchars($_GET["tpl"]));
            $child=addslashes(htmlspecialchars($_GET["child"]));
            $child?$child="_".$child:$child="";
            session("nav",strtolower($typeAction).$child);
            $this->assign("title",strtoupper($title));
            $this->display($typeAction."/".$typeTpl);
        }else{
            $this->display("Index/login");
        }
    }
    //编辑页面加载
    public function editor(){
        if($this->loginBool()){
            $title=addslashes(htmlspecialchars($_GET["title"]));
            $id=addslashes(htmlspecialchars($_GET["id"]));//id
            $action=addslashes(htmlspecialchars($_GET["action"]));//模块
            $child=addslashes(htmlspecialchars($_GET["child"]));//子模块
            $child?$child="_".$child:$child="";
        
            $tpl=addslashes(htmlspecialchars($_GET["tpl"]));//模板

            session("nav",strtolower($action).$child);//返回导航确认
            $this->assign("title",strtoupper($title));//返回标题
            $model=M(strtolower($action).$child);//模型
            $data=$model->where(array(strtolower($action).$child."_id"=>$id))->find();
            if($data["showtime"])$data["showtime"]=date("Y-m-d",$data["showtime"]);
            
            $this->assign('data',$data);
            $this->display($action."/".$tpl);//加载模板
        }else{
            $this->display("Index/login");
        }
    }

	
}
	









?>