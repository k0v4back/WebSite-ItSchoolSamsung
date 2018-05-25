<?php

class ApiiController{
	public function actionApi(){
		require_once(ROOT.'/views/api/vk_api.php');
		return true;
	}
}

?>