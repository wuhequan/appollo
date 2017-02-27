<?php
namespace Home\Controller;
use Think\Controller;
class JobController extends BaseController{
	public function index(){
		//banner
		$banner=M('banner_job')->where('status=1')->order('sort desc')->find();
		$this->assign('banner',$banner);


		$others=M('others')->where('others_id=1')->find();
		$this->assign('others',$others);

		//job
		$job=M('job')->where('status=1')->order('sort desc,showtime desc')->limit(8)->select();
		$this->assign('job',$job);
		

		$this->display();
	}

	public function ajax(){
		if(IS_AJAX){
			$id=I('post.id');
			$data=M('job')->where(array('`status`=1','job_id='.$id))->find();
			$data['showtime']=date('Y-m-d',$data['showtime']);
			$data['content']=html_entity_decode($data['content']);
			$data['content1']=html_entity_decode($data['content1']);
			$data['content2']=html_entity_decode($data['content2']);
			$this->ajaxReturn($data);
		}
	}	

	public function index_sub(){
		if(!IS_AJAX){$this->error('非法请求');}
        $su=I('get.su');
        $first= '8'+ $su*8;
        $count=M('job')->where('status=1')->count();
        if($first < $count){
        	$data=M('job')->where('status=1')->order('sort desc,showtime desc')->limit($first,'4')->select();
        	foreach ($data as $k => $v) {
        		$data[$k]['content2']=html_entity_decode($data[$k]['content2']);
        		$data[$k]['content2']=mb_substr($data[$k]['content2'],0,60,'utf8');
        		$data[$k][k]=$k+1;
        	}
        	$this->ajaxReturn($data);
    	}else{
            $this->ajaxReturn("1");
        }
       
	}

	
}