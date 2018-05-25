<?php

class Cabinet{

    //Data for personal cabinet
    public static function getCabinet()
    {
            if(!isset($_SESSION['logged_user']->login)){
                $logo = $_SERVER['SERVER_NAME'];
                header("Location: http://$logo/login");
            }
            $login = $_SESSION['logged_user']['login'];
            $finde = R::findOne('users', 'login = ?', array("$login"));
            $finde2 = R::load('users', $finde->id);
            return $finde;
    }

    //Get payment history
    public static function history_payment()
    {
        $login = $_SESSION['logged_user']['login'];
        $history = R::find('history_payment', 'login = ?', array("$login"));
        return $history;
    }

    public static function history_request()
    {
        $login = $_SESSION['logged_user']['login'];
        $request = R::find('order', 'login = ?', array("$login"));
        return $request;
    }

    public static function find_status_order()
    {
//        $login = $_SESSION['logged_user']['login'];
        $status = 1;
        $request = R::find('order', 'status2 = ?', array("$status"));
        if(isset($request)){
            return $request;
        }
    }

}
?>