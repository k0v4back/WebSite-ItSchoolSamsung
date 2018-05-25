<?php

//2.Подключение файлов системы (каркаса MVC)
define('ROOT', dirname(__FILE__));
include(ROOT.'/components/Router.php');
include(ROOT.'/components/Db.php');

//3.Установка соединения с БД
include ROOT.'/views/db/rb/rb.php';

R::setup('mysql:host=localhost;dbname=u0506979_default', 'u0506979_default', '_n5dLImF');
if(!R::testConnection()){
    echo 'Нет соединиения';
    die();
}else{
    //echo 'Соединение установлено';
    //echo '<br>';
    session_start();
}