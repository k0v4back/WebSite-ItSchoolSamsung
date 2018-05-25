<?php

class Router{

	private $routes;//Это массив в котором будут храниться маршруты

	public function __construct(){
		//Заставим класс Router прочитать маршруты и помнть их на время выполнения
		$routesPath = ROOT.'/config/routes.php';//путь к роутам
		$this->routes = include($routesPath); //свойству routes присваиваем массив с роутами
	}


	//получаем строку запроса
	private function getURI(){
		if (!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}




	//Будет принимать отправления от FrontController. Отвечает за анализ запроса и передачу управления
	public function run(){  

		//получаем строку запроса
		$uri = $this->getURI();

		//Проверить наличие такого запроса в файле routes.php
		foreach($this->routes as $uriPattern => $path){

			//Сравнивание $uriPattern и $uri
			if(preg_match("~$uriPattern~", $uri)){
				//Оперделить какой Controller и action обрабатывают запрос

				//Получаем внутренний путь из внещнего согласно правилу
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

				$segments = explode('/', $internalRoute);


				//Получим имя контроллера 
				$controllerName = array_shift($segments).'Controller';//Эта функция получает и удаляет первый элемент массива 
				$controllerName = ucfirst($controllerName);//Сделали первую букву заглавной
				// echo $controllerName;

				//Получим action
				$actionName = 'action'.ucfirst(array_shift($segments));

				$parameters = $segments;
				


				//Подключить файл класса контроллера
				$controllerFile = ROOT . '/controllers/' .$controllerName. '.php';
				if (file_exists($controllerFile)) {//проверяем существет ли такой файл на диске
					include_once($controllerFile);
				}


				//Создать объект класса контроллера и вызвать нужный метод(action)
				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				if ($result != null) {
					break;
				}

			}
		}

	}


}


?>