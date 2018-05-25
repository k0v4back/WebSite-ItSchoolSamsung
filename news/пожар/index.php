<?php
session_start();



ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);





//FRONT CONTROLLER



//1.Общие настройки

//ОТображение ошибок на время разаработки сайта

ini_set('display_errors', 1);

error_reporting(E_ALL);







//2.Подключение файлов системы (каркаса MVC)

define('ROOT', dirname(__FILE__));

require_once(ROOT.'/components/Router.php');

require_once(ROOT.'/components/Db.php');





//3.Установка соединения с БД

require_once ROOT.'/views/db/rb/rb.php';



R::setup('mysql:host=localhost;dbname=u0446312_newsportal', 'u0446312', 'E96!udVp');



if(!R::testConnection()){

  //echo 'Нет соединиения';

  die();

}else{

  //echo 'Соединение установлено';

  //echo '<br>';



	

}











//4.Вызов Router

$router = new Router();

$router->run();









?>