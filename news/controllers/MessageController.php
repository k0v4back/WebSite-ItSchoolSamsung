<?php

class MessageController{
	public function actionIndex(){
		require_once(ROOT.'/views/chat/message.php');
		return true;
	}
}

?>