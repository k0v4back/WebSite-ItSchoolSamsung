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

	function Ok(){
		$text = array(1 => 'Ok');
	    $result = json_encode($text);
	   	return $result;
	}

	function No(){
		$text = array(1 => 'No');
	    $result = json_encode($text);
	   	return $result;
	}

	// $Module = 'users';

	if($Module == 'login'){
	if(!$Param['login']) Error(1, 'Не указан логин пользователя');
	if(!$Param['password']) Error(3, 'Не указан пароль пользователя');

		$Exp = $Param['password'];
		 $Select = $Exp;
		

		$login = $Param['login'];
      	$password = $Param['password'];


//      	$user = R::findOne('users', 'login = ?', array($login));
//      if($user){
//        if(password_verify($password, $user->password)){
//          //Пароль совпадает
//	      	echo Ok();
//        }else{
//          //Пароль не совпадет, выведем ошибку
//          $errors[] = 'Пароль введён неверно!';
//          echo No();
//        }
//      }else{
//        $errors[] = 'Пользователь не найден';
//        echo No();
//      }


        if($Module == 'login'){
            if(!$Param['login']) Error(1, 'Не указан логин пользователя');
            if(!$Param['password']) Error(3, 'Не указан пароль пользователя');

            $Exp = $Param['password'];
            $Select = $Exp;
            $login = $Param['login'];
            $password = $Param['password'];

            $user = R::findOne('users', 'login = ?', array($login));
            $history = R::find('history_payment', 'login = ?', array($login));
            if (password_verify($password, $user->password) and $user != false) {
                // use is found
                $response["error"] = FALSE;
                $response["uid"] = $user["unique_id"];
                $response["user"]["name"] = $user["name"];
                $response["user"]["login"] = $user["login"];
                $response["user"]["email"] = $user["email"];
                $response["user"]["adress"] = $user["adres"];
                $response["user"]["phoneNumber"] = $user["phone"];
                $response["user"]["phoneNumber"] = $user["phone"];


                // foreach ($history as $key => $value) {
                // 	$responses["historyOfPayment"]["name"] = $value->login;
	               //  $responses["historyOfPayment"]["data"] = $value->time;
	               //  $responses["historyOfPayment"]["sum"] = $value->sum;
	               //  echo json_encode($responses);
                // }
                // $response["historyOfPayment"]["name"] = $history["login"];
                // $response["historyOfPayment"]["data"] = $history["time"];
                // $response["historyOfPayment"]["sum"] = $history["sum"];
                echo json_encode($response);
            } else {
                // user is not found with the credentials
                $response["error"] = TRUE;
                $response["error_msg"] = "Login credentials are wrong. Please try again!";
                echo json_encode($response);
            }

        } else {
            // required post params is missing
            $response["error"] = TRUE;
            $response["error_msg"] = "Required parameters email or password is missing!";
            echo json_encode($response);
        }





	}else echo No();
?>
