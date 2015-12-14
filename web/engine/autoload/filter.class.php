<?php if(!defined("IN_RULE")) die ("Oops");
Class filter {

	public function example($param) {
		return filter_var($param, FILTER_VALIDATE_EMAIL);	
	}


}
?>