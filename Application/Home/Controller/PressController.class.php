<?php
namespace Home\Controller;
use Think\Controller;
class PressController extends BaseController{
	//展会中心
	public function exhibition(){
		//banner
		$banner=M('banner_exhibition')->where('status=1')->order('sort desc')->select();
		$this->assign('banner',$banner);

		$data=M('exhibition')->where('status=1 AND seo=0')->order('sort desc,showtime desc')->limit(8)->select();
		$seo_data=M('exhibition')->where('status=1 AND seo=1')->order('sort desc,showtime desc')->select();
	
		$this->assign('data',$data);
		$this->assign('seo_data',$seo_data);
		$this->display();
	}

	public function exhibition_detail(){
		//banner
		$banner=M('banner_exhibition')->where('status=1')->order('sort desc')->select();
		$this->assign('banner',$banner);

		$id=I('id');
		$data=M('exhibition')->where('exhibition_id='.$id)->find();
		$data['maxUrl']=explode(',', $data['maxUrl']);
		$this->assign('data',$data);

		//相关
		$ids=$data['recommen'];
		$wheres['exhibition_id']=array('in',$ids);
		$datas=M('exhibition')->where($wheres)->order('sort desc')->select();
		$arr=array();
			foreach ($datas as $key => $value) {
				$arr[$key/2][$key%2]=$value;
			}
		
		$this->assign('arr',$arr);

		$this->display();

	}

	public function ajax_exhibition(){
		if(!IS_AJAX){$this->error('非法请求');}
        $su=I('get.su');
        $first= '4'+ $su*4;
        $count=M('exhibition')->where('status=1')->count();
        if($first < $count){
        	$data=M('exhibition')->where('status=1')->order('sort desc,createtime desc')->limit($first,'4')->select();
        	foreach ($data as $k => $v) {
        		$data[$k]['showtime']=date('M d,Y',$data[$k]['showtime']);
        	}
        	$this->ajaxReturn($data);
    	}else{
            $this->ajaxReturn("1");
        }
       
	}

	//新闻中心
	public function news(){
		//banner
		$banner=M('banner_news')->where('status=1')->order('sort desc')->select();
		$this->assign('banner',$banner);

		$data=M('news')->where('status=1 AND seo=0')->order('sort desc,showtime desc')->limit(8)->select();
		$seo_data=M('news')->where('status=1 AND seo=1')->order('sort desc,showtime desc')->select();

	
		$this->assign('data',$data);
		$this->assign('seo_data',$seo_data);
		$this->display();
	}

	public function news_detail(){
		//banner
		$banner=M('banner_news')->where('status=1')->order('sort desc')->select();
		$this->assign('banner',$banner);

		$id=I('id');
		$data=M('news')->where('news_id='.$id)->find();
		$data['maxUrl']=explode(',', $data['maxUrl']);
		
		$this->assign('data',$data);

		//相关
		$ids=$data['recommen'];
		$wheres['news_id']=array('in',$ids);
		$datas=M('news')->where($wheres)->order('sort desc')->select();
		$arr=array();
			foreach ($datas as $key => $value) {
				$arr[$key/2][$key%2]=$value;
			}
		
		$this->assign('arr',$arr);

		$this->display();

	}

	public function ajax_news(){
		if(!IS_AJAX){$this->error('非法请求');}
        $su=I('get.su');
        $first= '4'+ $su*4;
        $count=M('news')->where('status=1')->count();
        if($first < $count){
        	$data=M('news')->where('status=1')->order('sort desc,createtime desc')->limit($first,'4')->select();
        	foreach ($data as $k => $v) {
        		$data[$k]['showtime']=date('M d,Y',$data[$k]['showtime']);
        	}
        	$this->ajaxReturn($data);
    	}else{
            $this->ajaxReturn("1");
        }
       
	}
}