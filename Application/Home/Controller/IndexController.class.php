<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$this->display();
	}
	public function yzm(){
		$Verify = new \Think\Verify(); 
		$Verify->entry();
	}
}