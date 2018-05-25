<?php

class AboutController{
	public function actionMe(){
		require_once(ROOT.'/views/about/about.php');
		return true;
	}
}


?>