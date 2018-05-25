<?php

include_once ROOT.'/models/Download.php';

class DownloadController{
	public function actionIndex(){

	    $gofile = array();
	    $gofile = Download::getDownload();

		require ROOT.'/views/download/download.php';
		return true;
	}
}

?>