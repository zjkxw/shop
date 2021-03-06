<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	
	public $goto;
	public $__GOTO__='?m=Admin&c=Index&goto=';
	
	public function index(){
		//checkLogin
		
		//获取要去哪个页面
		$this->goto = $this->getGoto();
		//如果有数据传入
		$this->checkPost();
		//获得该页面需要的数据列表
		$this->list = $this->getList();
		//注入
		$this->assign('list',$this->list);
		//分页
		
		//视图
		$this->show();
	}
	
	function getGoto(){
		if(!empty($_GET['goto'])){
			return $_GET['goto'];
		}else{
			return '';
		}
	}
	
	//这个getList因为不够一般化可能要开个类来处理细节了
	function getList(){
		$tmp = $this->goto;
		if($num = strpos($this->goto,'Add')){//如果有Add就截取
			$tmp = 'type';
		}
		$table = M($tmp);
		$list = $table->select();
		//时间修正
		foreach($list as $key=>$value){
			if(!empty($list[$key]['create_time'])){
				$tmp = $list[$key]['create_time'];
				$list[$key]['create_time'] = date('Y-m-d h:i:s',$tmp);
			}
		}
		return $list;
	}
	
	function show(){
		$this->display('head');
		$this->display($this->goto);
		$this->display('foot');
	}
	
	function checkPost(){
		//表名不能为空
		if(empty($_GET['goto'])){
			return false;
		}
		
		if(empty($_POST)){
			return false;
		}
		//typeAdd格式对应表为type，截取add
		$pos = strpos($this->goto,'Add');
		$tableName = substr($this->goto,0,$pos);
		
		/*
		$model = D($tableName);
		function getList(){
			// goto select;
			return ;
		}
		order这种很难操作，还是做上述的模型吧
		*/
		//实例化表模型
		$table = M($tableName);
		//获取表单POST数据
		foreach($_POST as $key=>$value){
			$data[$key] = $value; 
		}
		$data['create_time'] = time();
		//需要数据验证吗？
		
		//创建数据并添加
		$table->create($data);
		if($table->add()){
			//跳转
			header('location:?m=Admin&c=Index&goto='.$tableName);
			exit();
		}
	}
}
?>