<?php 
namespace core;
if(!defined("IN_RULE")) die ("Oops");

class Router {
	public static $control;

	public function __construct(){}

	static function run()	{
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		if ( $control_name = filter_var($routes[1], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^([a-zA-Z0-9])+$/"))) ) {	
			self::$control = 'control_'.$control_name;
		} else {
			$control_name = 'index';
			self::$control = 'control_index';
		}
		if ( $model_name = filter_var($routes[2], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^([a-zA-Z0-9])+$/"))) ) {
			$model_name = $control_name.'_'.$model_name;
		} else $model_name = $control_name.'_index';
		$view_name = $model_name.'.view';

		$control_path = "engine/controls/".strtolower(self::$control).".php";

		if ( is_readable($control_path) ) { include_once($control_path); settype($msg, 	"string");} else { 
			include_once("engine/controls/control_exception.php");
			self::$control 	= "control_Exception"; 
			$model_name		= "exception";
			$view_name 		= "exception.view";
			$msg			= "Route to controller not found";
		}

		$controller = new self::$control;
		$controller->model_name = $model_name;
		$controller->view_name 	= $view_name;
		$controller->initmsg 	= $msg;

		if ( method_exists($controller, 'init') ) { $controller->init(); } 
	}

}
?>

