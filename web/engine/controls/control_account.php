<?php if(!defined("IN_RULE")) die ("Oops");
class control_account extends core\Controller {

	function init()	{	
		if (in_array($this->model_name, array("account_logout"))) {
			session_destroy(); header("location: /account/login"); exit;
		}	
		$pdo = DB::getInstance()->getConnection();
		if ($pdo == 'Connection failed') { $this->view->generate('_layout', 'exception.view','Setup DB connection.'); exit;}

		if ($_SESSION['AUTH'] == NULL)	{
			if (in_array($this->model_name, array("account_login", "account_register", "account_remind"))) {
				if ($this->model_name == "account_login") 		$data = array('showBlock' => 'login', 		'pageTitle'	=> 'Login');
				if ($this->model_name == "account_register") 	$data = array('showBlock' => 'register', 	'pageTitle'	=> 'Register');
				$this->model_name = 'wxod';
				$this->view_name = 'wxod.view';

				if ( is_readable("engine/model/".strtolower($this->model_name).".php") ) { 
					include_once("engine/model/".strtolower($this->model_name).".php"); 
					$this->model = new $this->model_name;
				}
				$data['captcha'] = $this->model->assignCaptcha($pdo);	
				$solved = 'Ok';		
				if ($data['captcha'] == 'show')  {
					$data['ReCaptchaSiteKey'] = RECAPTCHA_SITEKEY;
					if ($_SERVER['REQUEST_METHOD'] == 'POST') $solved = $this->model->verifyCaptcha(RECAPTCHA_PRIVATKEY); 
				}	
				if ($solved == 'Ok') {
					if (isset($_POST['signin'])) 	{ $data['message'] = $this->model->ProcessLogin($_POST['email'], $pdo);  }
					if (isset($_POST['signup'])) 	{ $data['message'] = $this->model->ProcessRegister($_POST['email'], $pdo);  }

					// here we axpect to get auth so check auth and send to account page if ok
					if (isset($_SESSION['AUTH'])) 			{ header("location: /account"); exit; }
				} else $data['message'] = 'Captcha not solved';

				$this->view->generate('_layout', $this->view_name, $data);
			} else { header("location: /account/login"); exit; }
		} else {
			$User = user::getInfo($_SESSION['AUTH'], $pdo);
			if (in_array($this->model_name, array("account_index"))) {

			} else { header("location: /account"); exit; }
			$this->view->generate('_layout', $this->view_name, $data);
		}

		$pdo = NULL;

		
	}


	private function loadModel()	{	
		$model_path = "engine/model/".strtolower($this->model_name).".php";
		if ( is_readable($model_path) ) { include_once($model_path); }
		$new =  new $this->model_name;
		return $new;
	}

}

?>