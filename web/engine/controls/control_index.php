<?php if(!defined("IN_RULE")) die ("Oops");
class control_index extends core\Controller {

	function init()	{	
		$model_path = "engine/model/".strtolower($this->model_name).".php";
		if( is_readable($model_path) ) { include_once($model_path); }
		$data = array('pageTitle'	=> 'your site Main');

		$this->view->generate('_layout', $this->view_name, $data);
	}
}

?>