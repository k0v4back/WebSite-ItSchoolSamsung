<!-- <form>
  <label for="name">php запрос</label>
  <input id="name"><br>
  <p><input type="submit" value="Отправитить"></p>
  <textarea id="comments" style="width: 300px; height: 300px" value="Ответ от php api"></textarea>
</form>
 -->

<?php

if($_SERVER['REQUEST_URI'] == '/'){
	$Page = 'index';
	$Module = 'index';
}else{
	$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$URL_Parts = explode('/', trim($URL_Path, ' /'));
	$Page = array_shift($URL_Parts);
	$Module = array_shift($URL_Parts);


if(!empty($Module));
$Param = array();
for($i = 0; $i < count($URL_Parts); $i++){
	$Param[$URL_Parts[$i]] = $URL_Parts[++$i];
}
}



function Error($p1, $p2){
	exit('{"error:"'.$p1.',"text":"'.$p2.'"}');
}

// $Module = 'users';

if($Module == 'users'){
if(!$Param['login']) Error(1, 'Не указан логин пользователя');
if(!$Param['param']) Error(2, 'Не указан параметор или параметры метода');

	// echo 'OK';

	$Param['login'] = strip_tags($Param['login']);

	$Array = array('login', 'regdate', 'id', 'email');//Этот массив будет содержвть в себе все разрешённыее параметры
	$Exp = explode('.', $Param['param']);
	foreach ($Exp as $key) if($Param['param'] != 'all' and !in_array($key, $Array)) Error(3, 'Парметор указан неверно');
	if ($Param['param'] == 'all') $Select = $Array;
	else $Select = $Exp;

	foreach ($Select as $key) $SQL = "`$key`,";

	$SQL = substr($SQL, 0, -1);


	
	// $zapros = R::getAll('SELECT $SQL FROM `users` WHERE `login` = ?', array($Param['login']));
	// //$zapros2 = JSON_UNESCAPED_UNICODE($zapros);

	// $zapros2 = json_encode($zapros, JSON_UNESCAPED_UNICODE);

	// echo $zapros2;

	$config = array(
	'db' => array(
		'server' => '127.0.0.1',
		'username' => 'root',
		'password' => '12345',
		'tablename' => 'newsportal'
	)
);

		$connect = mysqli_connect(
	$config['db']['server'],
	$config['db']['username'],
	$config['db']['password'],
	$config['db']['tablename']
);

	$Row = mysqli_fetch_assoc(mysqli_query($connect, "SELECT $SQL FROM `users` WHERE `login` = '$Param[login]'"));

	if(!$Row) Error(4, 'ПОльзователь не найден');
	echo json_encode($Row, JSON_UNESCAPED_UNICODE);



}else Error(0, 'Не указан логин пользователя');

?>
