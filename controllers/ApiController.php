<?php

class ApiController{
	public function actionIndex(){
		require_once(ROOT.'/views/api/apiLogin.php');
		return true;
	}
}

?>