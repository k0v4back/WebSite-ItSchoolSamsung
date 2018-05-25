<?php

include_once ROOT.'/models/Cabinet.php';

class CabinetController{

    public function actionCabinet(){

        $cabinet = array();
        $cabinet = Cabinet::getCabinet();

        $payment = array();
        $payment = Cabinet::history_payment();

        $request_order = array();
        $request_order = Cabinet::history_request();

        $find_status_order = array();
        $find_status_order = Cabinet::find_status_order();

        require ROOT.'/views/cabinet/cabinet2.php';

        return true;


    }


}

?>