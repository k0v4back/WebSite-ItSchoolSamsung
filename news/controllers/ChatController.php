<?php

class ChatController{
	public function actionIndex(){
		require_once(ROOT.'/views/chat/chat.php');
		return true;
	}
}

?>