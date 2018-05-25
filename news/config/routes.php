<?php
return array(
	// //'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
	// 'news/([0-9]+)' => 'news/view/$1', //actionView в NewsController

	// //'news/([0-9]+)' => 'news/view',
	// 'news' => 'news/index', //news - строка запроса. actionIndex(метод в контроллере) in NewsController


	'new/([0-9]+)' => 'new/view/$1', //ationView в NewsController
	'contact' => 'contact/cont', //actionCont в ContactController
	'news' => 'news/index', //news - строка запроса. actionIndex(метод в контроллере) in NewsController
	//'news/([0-9]+)' => 'news/oneNews/$1', //news - строка запроса. actionOneNews(метод в контроллере) in NewsController
	'about' => 'about/me', //actionMe в AboutController
	//Вход и регистрация
	'reg' => 'reg/index',
	'vhod' => 'vhod/index',
	'cabinet' => 'cabinet/index',
	'exit' => 'exit/index',
	'admin' => 'admin/index',
	'loginadmin' => 'loginadmin/index',
	'api' => 'api/index',
	'chat' => 'chat/index',
	'message' => 'message/index',
	'apii' => 'apii/api',
	'' => 'site/index', //actionIndex в SiteController

);	