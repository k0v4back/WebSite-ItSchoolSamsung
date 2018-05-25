<?php

class VhodController{
	public function actionIndex(){
		require_once(ROOT.'/views/avtoriza/vhod.php');
		return true;
	}
}
?>