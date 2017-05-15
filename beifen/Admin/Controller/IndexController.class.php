<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	
    public function index(){
		//导入
		$this->display('head');
		$this->display('goods');
		$this->display('foot');
	}
	public function goods(){
		$this->display('head');
		$this->display('goods');
		$this->display('foot');
	}
	public function goodsAdd(){
		$this->display('head');
		$this->display('goodsAdd');
		$this->display('foot');
	}
	public function order(){
		$this->display('head');
		$this->display('order');
		$this->display('foot');
	}
	public function orderAdd(){
		$this->display('head');
		$this->display('orderAdd');
		$this->display('foot');
	}
	public function type(){
		$this->display('head');
		$this->display('type');
		$this->display('foot');
	}
	public function typeAdd(){
		$this->display('head');
		$this->display('typeAdd');
		$this->display('foot');
	}
	public function user(){
		$this->display('head');
		$this->display('user');
		$this->display('foot');
	}
}