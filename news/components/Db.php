<?php

class Db{
	public static function getConnection(){
		$paramsPath = ROOT.'/config/db_params.php';
		$params = include($paramsPath);//ПОлучаем параметры соединения

		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";//Разбил строку на части
		$db = new PDO($dsn, $params['user'], $params['password']);//Подключаеся к БД

		return $db;
	}
}


?>
