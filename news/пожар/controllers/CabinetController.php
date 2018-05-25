<?php

class CabinetController{
	public function actionIndex(){
		require_once(ROOT.'/views/cabinet/cabinet.php  ');
		return true;
	}
}

?>