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

	if($Module == 'check') {
        if (!$Param['key']) Error(1, 'Не указан ключ пользователя');

        // $Exp = $Param['password'];
        //  $Select = $Exp;


        $key = $Param['key'];


        $go_key = R::findOne('users', 'unique_id = ?', array($key));
        if ($user) {

            echo 'Ключи совпадают';

            $text = 'Ключи совпадают';
            $result = json_encode($text);
            var_dump($result);


        } else Error(0, 'Ключи не совпадают');
    }

    ?>
