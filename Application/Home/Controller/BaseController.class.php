<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
	public function _initialize() {
        switch (CONTROLLER_NAME) {
            case 'Index':
                $meta="1";
                break;
            case 'About':
                $meta="2";
                break;
            case 'News':
                $meta="3";
                break;
            case 'Product':
                $meta="4";
                break;  
            case 'Cases':
                $meta="5";
                break; 
            case 'Join':
                $meta="6";
                break; 
            case 'Contact':
                $meta="7";
                break;
            case 'Vip':
                $meta="8";
                break;            
            default:
                break;
        } 
        
        $siteMetaM=M("site_meta");
        $siteMetaData=$siteMetaM->where(array("site_meta_id"=>$meta))->find();
        $this->assign("meta",$siteMetaData);
       

        //新闻分类
        $arr=M('news_classify')->where('status=1')->order('sort desc')->select();
        $this->assign('first',$arr[0]);    
        $this->assign('arr',$arr);

        //产品分类
        $wh['pid']=array('eq',0);
        $wh['status']=1;
        $arr1=M('product_classify')->where($wh)->order('sort desc')->select();
        $this->assign('first1',$arr1[0]); 
        $wh1['pid']=array('neq',0);
        $wh1['status']=1;
        $arr1_child=M('product_classify')->where($wh1)->order('sort desc')->select();
        $this->assign('arr1_child',$arr1_child); 

        
        $this->assign('arr1',$arr1);

        //方案分类
        $arr2=M('project_classify')->where('status=1')->order('sort desc')->select();
        $this->assign('first2',$arr2[0]);    
        $this->assign('arr2',$arr2);




    
    }
}