<?php if(!defined("IN_RULE")) die ("Oops");
Class User {

	public function getInfo($user, $dblink) {
		if(!isset($user)) {header("location: /account/login"); exit;}
	
		$uiname = filter_var($user, FILTER_SANITIZE_SPECIAL_CHARS);
		if ($stm = $dblink->prepare("SELECT * FROM  ".TABLE_USERS." WHERE email = ?")) {
			$stm->execute(array($uiname)); $out = $stm->fetch(); $stm = NULL;
		}
		if ($out['id'] == '') {session_destroy(); header("location: /account/login");exit;}
		return $out;
	}



}
?>
