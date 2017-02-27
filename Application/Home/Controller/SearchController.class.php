<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller{

	public function dosearch(){
		if(IS_POST){
			$keyword=$_POST['keyword'];
			if (empty($keyword)) {
				$this->assign('arr',$arr);
			}
			else{
			$where['title']=array('like','%'.$keyword.'%');
			$where['content']=array('like','%'.$keyword.'%');
			$where['_logic'] = 'OR';
			$arr=array();
			//产品
			$pro_list=M('product')->where($where)->order('sort desc,showtime desc')->limit(5)->field('product_id,imageUrl,title')->select();
			foreach ($pro_list as $k => $v) {
				$pro_list[$k]['meta']='Product';
				$arr[]=$pro_list[$k];
			}
			//新闻
			$news_list=M('news')->where($where)->order('sort desc,showtime desc')->limit(5)->field('news_id,imageUrl,title')->select();
			foreach ($news_list as $k1 => $v1) {
				$news_list[$k1]['meta']='News';
				$arr[]=$news_list[$k1];
			}
			//展会
			$exhibition_list=M('exhibition')->where($where)->order('sort desc,showtime desc')->limit(5)->field('exhibition_id,imageUrl,title')->select();
			foreach ($exhibition_list as $k2 => $v2) {
				$exhibition_list[$k2]['meta']='Exhibition';
				$arr[]=$exhibition_list[$k2];
			}
			//echo M('news')->_sql();
			$this->assign('arr',$arr);
			}
		}


		$this->display();
	}

	
}