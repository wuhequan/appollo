<?php 

namespace Admin\Controller;
use Think\Controller;
class MenuController extends BaseController
{
    /**
    *  首页
    */
    public function index(){
        $dataData=$this->listLoad("menu_index","栏目管理");
        $this->display();
    }


	
}
	









?>