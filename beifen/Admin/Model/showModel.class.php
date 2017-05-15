<?php
class showModel{
	function __construct($display=''){
		$this->display('head');
		$this->display($display);
		$this->display('foot');
	}
}
?>