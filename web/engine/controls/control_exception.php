<?php if(!defined("IN_RULE")) die ("Oops");
class control_Exception extends core\Controller {

	function init()	{	
		$model_path = "engine/model/".strtolower($this->model_name).".php";
		if( is_readable($model_path) ) { include_once($model_path); }

		$this->view->generate('_layout', $this->view_name, $this->initmsg);
	}
}

?>