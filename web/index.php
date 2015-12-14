<?php 
//$mem_start = memory_get_usage();
//$start = microtime(true);
//error_reporting(0);

session_start();
define("IN_RULE", TRUE);
date_default_timezone_set('Europe/Kiev');
require_once(dirname(__FILE__).'/engine/config.php');
require_once(dirname(__FILE__).'/engine/autoload.php');

core\Router::run();



//$time = microtime(true) - $start;
//$mem = memory_get_usage() - $mem_start;
//echo 'time '.$time.' seconds.<br>' ;
//echo 'used memory: '. $mem  .' b';
?>