<?php
namespace Home\Controller;
use Think\Controller;
class ExperienceController extends BaseController{

	public function index(){
		//banner
		$banner=M('banner_experience')->where('status=1')->order('sort desc')->find();
		$this->assign('banner',$banner);

		//新闻列表
		$where['status']=1;
		$arr=M('experience')->where($where)->order('sort desc,showtime desc')->limit(6)->select();
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

	public function news_sub(){

		if(!IS_AJAX){$this->error('非法请求');}
        $su=I('get.su');
        $first= '6'+ $su*6;
		$where['status']=1;
        $count=M('experience')->where($where)->count();
        if($first < $count){
        	
        	$arr=M('experience')->where($where)->order('sort desc,showtime desc')->limit($first,'6')->select();


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

	public function detail(){
		$pid=I('pid');
		$data=M('news')->where('news_id='.$pid)->find();
		$this->assign('data',$data);

		$where1['news_id']=array('lt',$pid);
		$where1['news_classify_id']=$data['news_classify_id'];
		$where1['status']=1;
		$where2['news_id']=array('gt',$pid);
		$where2['news_classify_id']=$data['news_classify_id'];
		$where2['status']=1;
		$List_pre=M('news')->where($where1)->order('news_id desc,sort desc,showtime desc')->limit(1)->find();
        $List_next=M('news')->where($where2)->order('news_id asc,sort desc,showtime desc')->limit(1)->find();
        $this->assign('pre',$List_pre);
        $this->assign('next',$List_next);


		$this->display();
	}

	//视频中心
	public function video(){
		//banner
		$banner=M('banner_culture')->where('status=1')->order('sort desc')->find();
		$this->assign('banner',$banner);

		//新闻分类
		$classify=M('news_classify')->where('status=1')->order('sort desc')->select();
		$this->assign('classify',$classify);


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