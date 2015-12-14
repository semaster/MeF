<?php 
namespace core;
if(!defined("IN_RULE")) die ("Oops");

Class View {

	function generate ($template_view, $content_view,  $data = null)	{
		if (is_array($data)) { foreach ($data as $Key=>$Value)  $$Key = $Value; }
		$template_path = "engine/view/".strtolower($template_view).".php";
		if( is_readable($template_path) ) { include_once($template_path); }
	}
}
