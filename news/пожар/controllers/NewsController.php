<?php

class NewsController{
	public function actionIndex(){
		require_once(ROOT.'/views/news/news.php');
		return true;
	}
}


?>