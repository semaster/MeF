<?php 
namespace core;
if(!defined("IN_RULE")) die ("Oops");

class Controller {
	public $model_name;
	public $model;
	public $view_name;
	public $view;
	public $initmsg;
	function __construct()	{
		$this->view = new View();
	}
	function init()	{}
}
