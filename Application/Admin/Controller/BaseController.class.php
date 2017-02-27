<?php 

namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller
{

    public function _initialize(){
        $data["title"]= "欢迎进入威士丹利网站后台管理系统";
        $this->assign('base',$data);
        
        //session_unset();
        //后台权限控制
        if($_SESSION["roleUrls"]){
            $urls=$_SESSION["roleUrls"];
            $url=__ACTION__;
            //print_r($_SESSION["roleUrls"]);

            $urlArr=explode("/",$url);
            $url="/".$urlArr[1]."/".$urlArr[2]."/".$urlArr[3];

            $bool=!strstr($urls, $url)&&
                !strstr($urls, str_replace("_Submit","",$url))&&
                !strstr($urls, str_replace("_submit","",$url))&&
                !strstr($urls, str_replace("_add","",$url))&&
                !strstr($urls, str_replace("_Add","",$url))&&
                !strstr($urls, str_replace("_Editor","",$url))&&
                !strstr($urls, str_replace("_editor","",$url));

            
        }
    }
    
    /*判断是否登录*/
    Public function loginBool(){
        
        if ($_SESSION['admin_username']&&$_SESSION['admin_password']&&$_SESSION['admin_id']) {

            $adminM = M('admin');
            $data=array(
                'admin_id'=>$_SESSION['admin_id'],
                'admin_username'=>$_SESSION['admin_username'],
                'admin_password'=>$_SESSION['admin_password'],
                'status'=>1
            );
            $resout=$adminM->where($data)->find();
            
            if($resout){
                $this->navLoad($resout["role"]);
                return true;
            }else{
                return false;
            }
        }else{
           return false;
        }
    }
     /*加载菜单*/
    private function navLoad($role){
        $dataM=M("nav_left");
        $roleArr=explode(",", $role);
        $whereData["status"]=1;
        $whereData["father_id"]=0;
        $whereData["nav_left_id"]=array('in',$roleArr); 
        //当前权限对应的链接数组
        $roleArrUrl=array();
        //一级父类所有菜单
        $dataData=$dataM->where($whereData)->order("sort desc")->select();
        //print_r($dataData);
        foreach ($dataData as $key => $value) {
            if($value["url"]&&!$_SESSION["roleUrls"])array_push($roleArrUrl, "/Admin/".$value["url"]);
            //查询当前第一级下的全部二级菜单
            $whereData["father_id"]=$value["nav_left_id"];
            $dataData[$key]["child"]=$dataM->where($whereData)->order("sort desc")->select();
            if($dataData[$key]["child"]){
                foreach ($dataData[$key]["child"] as $key1 => $value1) {
                    if($value1["url"]&&!$_SESSION["roleUrls"])array_push($roleArrUrl, "/Admin/".$value1["url"]);
                    $whereData["father_id"]=$value1["nav_left_id"];
                    $dataData[$key]["child"][$key1]["child"]=$dataM->where($whereData)->order("sort desc")->select();
                    if(!$_SESSION["roleUrls"]){
                        foreach ($dataData[$key]["child"][$key1]["child"] as $key2 => $value2) {
                            if($value2["url"])array_push($roleArrUrl, "/Admin/".$value2["url"]);
                        }
                    }
                }
            }
        }

        if(!$_SESSION["roleUrls"]){
            foreach (C('URL_PASS') as $key => $value) {
                array_push($roleArrUrl, $value);
            }
            session("roleUrls",implode(",", $roleArrUrl));

        }
        //print_r($roleArrUrl);
        $this->assign("leftNav",$dataData);
    }
   /*获取IP*/
    public function getIP()
    {
        global $ip;
        if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
        else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
        else $ip = "Unknow";
        return $ip;
    }
    /*加密机制*/
    public function pwMd5($password){
        $password=md5($password);
        $password=substr($password,4);
        $password="cc".$password;
        $password=md5($password);
        return $password;
    }

    /*----------------华丽的分割线--------------------*/
    /*列表加载*/
    public function listLoad($nav,$title,$model,$whereData,$orderData){
        if($this->loginBool()){
            session("nav",$nav);
            $this->assign("title",$title);
            if(!empty($model)){
                $dataM=M($model);
                $id=$model."_id";

                $count=$dataM->where($whereData)->count();
                $page=new \Think\Page($count,40);
                $showpage=$page->show();
                $dataData=$dataM->where($whereData)->field('content',true)->limit($page->firstRow,$page->listRows)->order($orderData)->select();
                $this->assign("pageShow",$showpage);


                
                //$dataData=$dataM->where($whereData)->order($orderData)->select();
            }
            foreach ($dataData as $key => $value) {
                if(!empty($dataData[$key]["createtime"])){$dataData[$key]["createtime"]=date('Y-m-d H:i:s',$value["createtime"]);}
                if(!empty($dataData[$key]["lastsavetime"])){$dataData[$key]["lastsavetime"]=date('Y-m-d H:i:s',$value["lastsavetime"]);}
                if(!empty($dataData[$key]["showtime"])){$dataData[$key]["showtime"]=date('Y-m-d',$value["showtime"]);}
            }
            //echo  $dataM->getLastSql();
            return $dataData;
        }else{
            $this->display("Index/login");
            exit;
        }
    }
     /*评论列表加载*/
    public function clistLoad($nav,$title,$model,$whereData,$orderData){
        if($this->loginBool()){
            session("nav",$nav);
            $this->assign("title",$title);
            if(!empty($model)){
                $dataM=M($model);
                $id=$model."_id";

                $count=$dataM->where($whereData)->count();
                $page=new \Think\Page($count,10);
                $showpage=$page->show();
                $dataData=$dataM->where($whereData)->limit($page->firstRow,$page->listRows)->order($orderData)->select();
                $this->assign("pageShow",$showpage);


                
                //$dataData=$dataM->where($whereData)->order($orderData)->select();
            }
            foreach ($dataData as $key => $value) {
                if(!empty($dataData[$key]["createtime"])){$dataData[$key]["createtime"]=date('Y-m-d H:i:s',$value["createtime"]);}
                if(!empty($dataData[$key]["lastsavetime"])){$dataData[$key]["lastsavetime"]=date('Y-m-d H:i:s',$value["lastsavetime"]);}
                if(!empty($dataData[$key]["showtime"])){$dataData[$key]["showtime"]=date('Y-m-d',$value["showtime"]);}
            }
            //echo  $dataM->getLastSql();
            return $dataData;
        }else{
            $this->display("Index/login");
            exit;
        }
    }
    /*列表加载*/
    public function listLoadopo($data){
        $nav=$data['nav'];
        $title=$data['title'];
        $model=$data['model'];
        $whereData=$data['whereData'];
        $orderData=$data['orderData'];
        $field=$data['field'];
        $fieldStatus=$data['field'];
        if(empty($fieldStatus))$fieldStatus=0;
        if($this->loginBool()){
            session("nav",$nav);
            $this->assign("title",$title);
            if(!empty($model)){
                $dataM=M($model);
                $id=$model."_id";
                if($field){
                    $field = $field.",$id,title,showtime,sort,status";
                }else{
                    $field = "$id,title,showtime,sort,status";
                }   
                if($fieldStatus){
                    $field="";
                }
                $count=$dataM->where($whereData)->count();
                $page=new \Think\Page($count,40);
                $showpage=$page->show();
                $dataData=$dataM->where($whereData)->field($field)->limit($page->firstRow,$page->listRows)->order($orderData)->select();
                $this->assign("pageShow",$showpage);
            }
            foreach ($dataData as $key => $value){
                if(!empty($dataData[$key]["createtime"])){$dataData[$key]["createtime"]=date('Y-m-d H:i:s',$value["createtime"]);}
                if(!empty($dataData[$key]["lastsavetime"])){$dataData[$key]["lastsavetime"]=date('Y-m-d H:i:s',$value["lastsavetime"]);}
                if(!empty($dataData[$key]["showtime"])){$dataData[$key]["showtime"]=date('Y-m-d',$value["showtime"]);}
            }
            return $dataData;
        }else{
            $this->display("Index/login");
            exit;
        }
    }
   /*单页面加载*/
    public function oneLoad($nav,$title,$model,$idname,$id,$field=""){
        if($this->loginBool()){
            session("nav",$nav);
            $this->assign("title",$title);
            if(!empty($model)){
                $dataM=M($model);
                $dataData=$dataM->where(array($idname=>$id))->field($field)->find();
            }
            if(!empty($dataData["showtime"])){$dataData[$key]["showtime"]=date('Y-m-d',$dataData["showtime"]);}
            return $dataData;
        }else{
            $this->display("Index/login");
            exit;
        }
    }
    /*
    *   nav 后台菜单确认
    *   title 后台标题
    *   model 数据表名
    *   order 排序方式
    *   where 查询条件
    *   ways 查询的方式  one单条数据 list多条数据
    */
    public function load($data){
        if($this->loginBool()){}else{
            $this->display("Index/login");return;
        }
        //初始化数据
        foreach ($data as $key => $value) {
            if(!$data["ways"])$data["ways"]="list";
            if(!$data["order"])$data["order"]="";
        }
       
        session("nav",$data["nav"]);
        $this->assign("title",$data["title"]);
        $dataM=M($data["model"]);
        $dataData=array();
        if($data["ways"]=="list")
            $dataData=$dataM->where($data["where"])->order($data["order"])->select();
        else if($data["ways"]=="sone")
            $dataData[0]=$dataM->where($data["where"])->find();

        foreach ($dataData as $key => $value) {
            if(!empty($dataData[$key]["createtime"])){$dataData[$key]["createtime"]=date('Y-m-d H:i:s',$value["createtime"]);}
            if(!empty($dataData[$key]["lastsavetime"])){$dataData[$key]["lastsavetime"]=date('Y-m-d H:i:s',$value["lastsavetime"]);}
            if(!empty($dataData[$key]["showtime"])){$dataData[$key]["showtime"]=date('Y-m-d',$value["showtime"]);}
        }
        //判断返回单数据，多数据

        if($data["ways"]=="list")
            return $dataData; 
        else if($data["ways"]=="one")
            return $dataData[0];
            
        
    }
    /*表单公共添加*/
    public function formAddSubmit($data,$modelName){

        $dataM=M($modelName);
        $id=$dataM->add($data);
        if($id){
            return $id;
        }else{
            return 0;
        }

    }
    /*带图片表单公共添加*/
    public function formAddImageSubmit($data,$modelName,$imageData,$dirname){
        if($dirname){mkdir($dirname, 0777, true);}
        
        $dataM=M($modelName);
        $id=$dataM->add($data);
        if($id){
            if($dirname){//判读是否有文件路径
                if(!is_dir($dirname."/".$id)){
                    mkdir($dirname."/".$id, 0777, true);//创建文件
                }
                $dataDatas=$dataM->where(array($modelName."_id"=>$id))->find();//查询新插入的数据
                $dataDatas[$imageData[0]["title"]]=str_replace($dirname, $dirname."/".$id, $dataDatas[$imageData[0]["title"]]);//替换路径
                $dataM->where(array($modelName."_id"=>$id))->save(array($imageData[0]["title"]=>$dataDatas[$imageData[0]["title"]]));//重新存入
            }
            $dataData=array();
            if($dirname){//有文件路径就修改原路径
                $data[$imageData[0]["title"]]=str_replace($dirname,$dirname."/".$id, $data[$imageData[0]["title"]]);
                
            }
            $dataData=explode(",", $data[$imageData[0]["title"]]);
            foreach ($imageData as $key => $value) {
                $value["imageUrl"]=str_replace("/Public", "Public", $value["imageUrl"]);
                $dataData[$key]=str_replace("/Public", "Public", $dataData[$key]);
                $this->water('./'.$value["imageUrl"]);

                rename($value["imageUrl"],$dataData[$key]);
            }
            return $id;
        }else{
            return "0";
        }
    
    }
    public function formAddImageSubmits($data,$modelName,$imageData,$dirname){
        if($dirname){mkdir($dirname, 0777, true);}
        $dataM=M($modelName);
        
        $id=$dataM->add($data);
        if($id){
            if($dirname){//判读是否有文件路径
                if(!is_dir($dirname."/".$id)){
                    mkdir($dirname."/".$id, 0777, true);//创建文件
                }
                $dataDatas=$dataM->where(array($modelName."_id"=>$id))->find();//查询新插入的数据
                $imageWhereData=array();//用于存放加入ID的图片目录
                foreach ($imageData as $key => $value) {
                    $imageWhereData[$value[0]["title"]]=str_replace($dirname, $dirname."/".$id, $dataDatas[$value[0]["title"]]);//替换路径
                    //编辑器里的图片替换路径
                    if(is_numeric(strpos($value[0]["title"],'Urlc'))){
                        $title=str_replace('Urlc','',$value[0]["title"]);
                        
                        $imageWhereData[$title]=str_replace($dirname, $dirname."/".$id,$dataDatas[$title]);//替换路径
                        //echo $imageWhereData[$title];
                    }
                }
                $dataM->where(array($modelName."_id"=>$id))->save($imageWhereData);//重新存入
            }
            /*print_r($imageData);
            print_r($dataDatas);
            echo'--c--';
            print_r($data);exit;*/
            if($dirname){//有文件路径就修改原路径
                foreach ($imageData as $key => $value) {
                    $data[$value[0]["title"]]=str_replace($dirname, $dirname."/".$id, $data[$value[0]["title"]]);//替换路径
                }
            }
            
            foreach ($imageData as $key1 => $value1) {
                $dataData=explode(",", $data[$value1[0]["title"]]);//拿到新图片路径

                foreach ($value1 as $key => $value) {
                    $value["imageUrl"]=str_replace("/Public", "Public", $value["imageUrl"]);
                    $dataData[$key]=str_replace("/Public", "Public", $dataData[$key]);
                    $this->water('./'.$value["imageUrl"]);
                    
                    
                    rename($value["imageUrl"],$dataData[$key]);
                } 
            }
            return $id;
        }else{
            return "0";
        }
    
    }

    /*表单公共更新*/
    public function formEditorSubmit($data,$modelName,$whereData){

        $dataM=M($modelName);
        $id=$dataM->where($whereData)->save($data);
        if($id){
            return $id;
        }else{
            return "0";
        }
    }
    /*带图片表单公共更新*/
    //单图片数组
    public function formEditorImageSubmit($data,$modelName,$whereData,$imageData,$dirname,$status){
        if(empty($status)){
            $status=1;
        }
        $dataM=M($modelName);
        $dataData=$dataM->where($whereData)->find();//查询旧的数据
        $dataData[$imageData[0]["title"]]=explode(",", $dataData[$imageData[0]["title"]]);
        if($dirname){
            if(!is_dir($dirname."/".reset($whereData))){
                mkdir($dirname."/".reset($whereData), 0777, true);
            }
        }
        $id=$dataM->where($whereData)->save($data);
        if($id){
            $data[$imageData[0]["title"]]=explode(",", $data[$imageData[0]["title"]]);
           
            foreach ($imageData as $key => $value) {
                $value["imageUrl"]=str_replace("/Public", "Public", $value["imageUrl"]);
                $data[$value["title"]][$key]=str_replace("/Public", "Public", $data[$value["title"]][$key]);
                $dataData[$value["title"]][$key]=str_replace("/Public", "Public",$dataData[$value["title"]][$key]);
                
                if($status){
                    $this->water('./'.$value["imageUrl"]);
                }

                rename($value["imageUrl"],$data[$value["title"]][$key]);
                if(file_exists($dataData[$value["title"]][$key])&&$value["imageUrl"]!=$dataData[$value["title"]][$key]){
                    unlink ($dataData[$value["title"]][$key]); 
                }
            }
            return $id;
        }else{
            return "0";
        }
    
    }
    //多图片数据
     public function formEditorImageSubmits($data,$modelName,$whereData,$imageData,$dirname){

        $dataM=M($modelName);
        $dataData=$dataM->where($whereData)->find();//查询旧的数据
        
        if($dirname){
            if(!is_dir($dirname."/".reset($whereData))){
                mkdir($dirname."/".reset($whereData), 0777, true);
            }
        }
        $id=$dataM->where($whereData)->save($data);
        if($id){
           
            foreach ($imageData as $key1 => $value1) {

                $dataData[$imageData[$key1][0]["title"]]=explode(",", $dataData[$imageData[$key1][0]["title"]]);//旧图片数据
                $data[$imageData[$key1][0]["title"]]=explode(",", $data[$imageData[$key1][0]["title"]]);//新图片数据
                
                foreach($dataData[$imageData[$key1][0]["title"]] as $k=>$v){
                        $dataData[$imageData[$key1][0]["title"]]=str_replace("/Public", "Public",$dataData[$imageData[$key1][0]["title"]]);
                    }

                foreach ($value1 as $key => $value) {

                    $value["imageUrl"]=str_replace("/Public", "Public", $value["imageUrl"]);
                    $data[$value["title"]][$key]=str_replace("/Public", "Public", $data[$value["title"]][$key]);
                    
                    if(in_array($value["imageUrl"], $dataData[$value["title"]]) != true){
                        $this->water('./'.$value["imageUrl"]);              //当图片不存与旧数据在才加水印
                    }
                    
                    rename($value["imageUrl"],$data[$value["title"]][$key]);

                    $arrayN[]=$value['imageUrl'];             //新的图片在一个数组  用来做删除图片
                    $arrayJ=$dataData[$value["title"]];     //旧的在一个数组       用来做删除图片
                    
                    
                }
                $cc=array_diff($arrayJ,$arrayN);
                foreach($cc as $kk=>$vv){
                    if(file_exists($vv)){
                        unlink($vv);
                    }
                }
                $arrayJ="";
                $arrayN="";
                $cc="";
                
            }
            
            return $id;
        }else{
            return "0";
        }
    
    }


    function getmaxdim($arr){
        if(!is_array($arr)){
            return 0;
        }else{
            $dimension = 0;
            foreach($arr as $item1){
                $t1=$this->getmaxdim($item1);
            if($t1>$dimension){$dimension = $t1;}
            }
            return $dimension+1;
        }

    }
    /*
    * 递归分类
    */
    public function getClassify($model,$pids=0,$data=array(),$sp=""){
        $dataM=M($model);
        $id=$model."_id";
        
        $dataArray=$dataM->where(array("pid"=>$pids))->order("sort desc")->select();
        foreach ($dataArray as $key => $value) {
            $value['sp']=$sp;
            $value['createtime']=date('Y-m-d H:i:s',$value["createtime"]);
            $value['lastsavetime']=date('Y-m-d H:i:s',$value["lastsavetime"]);
            $data[]=$value;
            $data=$this->getClassify($model,$value[$id],$data,$sp."|-&nbsp;&nbsp;");
        }
        return $data;
    }
    /*
    * 分类下拉
    */
    public function displayClassify($model,$pid=0,$ids="",$classifyId){
        $data=$this->getClassify($model,$pid);
        if(empty($classifyId))$classifyId="classify";
        $id=$model."_id";
        if($ids == 0){
            $selected1="selected";
        }
        $str ="<select class='span3 m-wrap category' name='classify' id=$classifyId tabindex='1'>";
        $str .= "<option $selected1  value='0'>顶级分类</option>";
        foreach ($data as $k => $v) {
            if($pid==$v[$id] && $pid!=0 && empty($ids)){
                $selected="selected";
            }elseif ($ids == $v[$id]) {
                $selected="selected";
            }
            else{
                $selected=""; 
            }
            $str .= "<option $selected value='{$v[$id]}' ips='{$v['pid']}'>{$v['sp']}{$v['title']}</option>";
        }
        $str .="</select>";
        return $str;
    }
    /*
    * 列表页分类显示
    */
    public function listClassify($model,$pids=0,$data=array(),$sp="|->",$title=""){
        $dataM=M($model);
        $id=$model."_id";
        $dataArray=$dataM->where(array("pid"=>$pids))->field("$id,title,pid")->select();

        
        foreach ($dataArray as $key => $value) {
            $t=$title;
            if($pids != 0){
                $t .=$sp.$value['title'];
                $value['title']=$t;
            }else{
                $t =$value['title'];
                $value['title']=$t;
            }
            
            $data[]=$value;
              


            $data=$this->listClassify($model,$value[$id],$data,$sp,$t);

        }
        return $data;
    } 
    //正则图片路径
    public function preg($data){
        $str=$_POST["content"];
        $reg = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
        preg_match_all($reg,$str,$matches);
        return $matches[1];
    }
    //添加水印
    public function water($imgurl){
        $waterurl='.'.$_SESSION['water_waterurl'];
        $status=$_SESSION['water_status'];
        $degree=$_SESSION['water_degree'];

        if(empty($waterurl)||empty($status)||empty($degree)){
            $data=M('site_watres')->where(array("site_watres_id"=>"1"))->find();
            session('water_waterurl',$data['imageUrl']);
            session('water_degree',$data['degree']);
            session('water_status',$data['status']);
            $degree=$data['degree'];
            $waterurl=".".$data['imageUrl'];
            //$position=$data['position'];
            $status=$data['status'];

            //print_r($degree);
            //print_r($status);
            //print_r($waterurl);
        }
        if($status){
            $image = new \Think\Image(); 
            $image->open($imgurl)->water($waterurl,\Think\Image::IMAGE_WATER_SOUTHEAST,$degree)->save($imgurl); 
        }
        
        
    }
}









?>