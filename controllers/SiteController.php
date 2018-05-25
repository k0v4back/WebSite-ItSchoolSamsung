<?php

class SiteController{
	public function actionIndex(){
		require ROOT.'/views/site/index.php';
		return true;
	}
}

?>