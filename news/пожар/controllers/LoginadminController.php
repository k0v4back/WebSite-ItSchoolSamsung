<?php

class LoginadminController{
	public function actionIndex(){
		require_once(ROOT.'/views/admin/loginadmin.php  ');
		return true;
	}
}

?>