<?php
namespace Home\Controller;
use Think\Controller;
class AboutController extends BaseController{
	//品牌介绍
	public function brand(){
		//banner
		$banner=M('banner_culture')->where('status=1')->order('sort desc')->find();
		$this->assign('banner',$banner);

		$brand=M('brand')->where('brand_id=1')->find();
		$this->assign('brand',$brand);

		$brand1=M('brand1')->where('status=1')->order('sort desc,showtime desc')->select();
		$this->assign('brand1',$brand1);

		$brand2=M('brand2')->where('status=1')->order('sort desc,showtime desc')->select();
		$this->assign('brand2',$brand2);

		$brand3=M('brand3')->select();
		$this->assign('brand3',$brand3);

		$this->display();
	}

	//企业文化
	public function culture(){
		//banner
		$banner=M('banner_culture')->where('status=1')->order('sort desc')->find();
		$this->assign('banner',$banner);

		

		//新闻列表
		$where['status']=1;
		$arr=M('culture')->where($where)->order('sort desc,showtime desc')->limit(6)->select();
		foreach ($arr as $key => $value) {
			$arr[$key][sk]=$key+1;
		}
		
		$data=array();
			foreach ($arr as $k => $v) {
				$data[$k/2][$k%2]=$v;
		}
	

		$this->assign('data',$data);


		$this->display();
	}

	public function culture_detail(){
		$pid=I('pid');
		$data=M('culture')->where('culture_id='.$pid)->find();
		$this->assign('data',$data);

		$this->display();
	}

	public function news_sub(){

		if(!IS_AJAX){$this->error('非法请求');}
        $su=I('get.su');
        $first= '6'+ $su*6;
		$where['status']=1;
        $count=M('culture')->where($where)->count();
        if($first < $count){
        	
        	$arr=M('culture')->where($where)->order('sort desc,showtime desc')->limit($first,'6')->select();


        	foreach ($arr as $k => $v) {
        		$arr[$k][sk]=$k+1;
        		$arr[$k]['showtime']=date('Y-m-d',$arr[$k]['showtime']);
        	}
        	$data=array();
			foreach ($arr as $k => $v) {
				$data[$k/2][$k%2]=$v;
			}

        	$this->ajaxReturn($data);
    	}else{
            $this->ajaxReturn("1");
        }
       
	}

	//光辉历程
	public function info(){
		//banner
		$banner=M('banner_culture')->where('status=1')->order('sort desc')->find();
		$this->assign('banner',$banner);

		$info=M('info')->where('status=1')->order('title desc')->select();
		$this->assign('info',$info);

		$other=M('other')->where('other_id=1')->find();
		$other['info']=nl2br($other['info']);
		$other['info']=explode('<br />', $other['info']);
		foreach ($other['info'] as $k1 => $v2) {
					$other['info'][$k1]=trim($other['info'][$k1]);
					$other['info'][$k1]=''.$other['info'][$k1];
		}

		$this->assign('other',$other);

		$this->display();
	}

	//光辉历程
	public function honor(){
		//banner
		$banner=M('banner_culture')->where('status=1')->order('sort desc')->find();
		$this->assign('banner',$banner);

		$honor=M('honor')->where('status=1')->order('year asc')->select();
		$this->assign('honor',$honor);


		$this->display();
	}

	//视频中心
	public function video(){
		//banner
		$banner=M('banner_culture')->where('status=1')->order('sort desc')->find();
		$this->assign('banner',$banner);


		$curr_video=M('video')->order('sort desc,showtime desc')->where('showindex=1')->find();
		$this->assign('curr_video',$curr_video);

		$where['video_id']=array('neq',$curr_video['video_id']);
		$where['status']=1;
		$arr=M('video')->where($where)->order('sort desc,showtime desc')->limit(6)->select();
		foreach ($arr as $key => $value) {
			$arr[$key][sk]=$key+1;
		}
		$video=array();
			foreach ($arr as $k => $v) {
				$video[$k/2][$k%2]=$v;
			}
		$this->assign('video',$video);

		$videos=M('video')->where($where)->order('sort desc,showtime desc')->select();

		$this->assign('videos',$videos);


		$this->display();
	}

	public function index_sub(){
		if(!IS_AJAX){$this->error('非法请求');}
		$curr_video=M('video')->order('sort desc,showtime desc')->where('showindex=1')->find();
		$where['video_id']=array('neq',$curr_video['video_id']);
		$where['status']=1;

        $su=I('get.su');
        $first= '6'+ $su*6;
        $count=M('video')->where($where)->count();
        if($first < $count){
        	$arr=M('video')->where($where)->order('sort desc,showtime desc')->limit($first,'6')->select();
        	foreach ($arr as $k => $v) {
        		$arr[$k][sk]=$k+1;
        		$arr[$k]['showtime']=date('Y.m.d',$arr[$k]['showtime']);
        	}
        	$data=array();
			foreach ($arr as $k => $v) {
				$data[$k/2][$k%2]=$v;
			}

        	$this->ajaxReturn($data);
    	}else{
            $this->ajaxReturn(1);
        }
       
	}
}