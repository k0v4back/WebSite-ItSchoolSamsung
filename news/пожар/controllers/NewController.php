<?php

class NewController{
	public function actionView($id){
		require_once(ROOT.'/views/new/new.php');
		return true;
	}
}


?>