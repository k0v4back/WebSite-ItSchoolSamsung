<?php

class ApirequestController{
    public function actionIndex(){
        require_once(ROOT.'/views/api/apirequest.php');
        return true;
    }
}

?>