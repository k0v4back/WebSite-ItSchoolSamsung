<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="ru" />
    <title>Test RedBean</title>
</head>
<body>

<?php
mb_internal_encoding("UTF-8");
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


if($Module == 'login'){
    if(!$Param['login']) Error(1, json_encode('Не указан логин пользователя'));
    if(!$Param['name']) Error(1, json_encode('Не указано имя пользователя'));
    if(!$Param['location']) Error(1, json_encode('Не указано место жительства'));
    if(!$Param['mail']) Error(1, json_encode('Не указан почтовый адрес'));
    if(!$Param['contact']) Error(1, json_encode('Не указаны контакты'));
    if(!$Param['target']) Error(1, json_encode('Не указаны цели'));
    if(!$Param['object']) Error(1, json_encode('Не указан объект'));
    if(!$Param['where']) Error(1, json_encode('Не указано местонахождение объекта'));
    if(!$Param['rights']) Error(1, json_encode('Не указаны права'));
    if(!$Param['period']) Error(1, json_encode('Не указан период'));
    if(!$Param['plan_max_hour']) Error(1, json_encode('Не указан планируемый срок вывода в эксплуатацию объекта'));
    if(!$Param['max_hour']) Error(1, json_encode('Не указан максимальная величиа расхода на газ'));
    if(!$Param['plan_term']) Error(1, json_encode('Не указан планируемый срок'));

    $login = $Param['login'];
    $name = $Param['name'];
    $location = $Param['location'];
    $mail = $Param['mail'];
    $contact = $Param['contact'];
    $target = $Param['target'];
    $object = $Param['object'];
    $where = $Param['where'];
    $rights = $Param['rights'];
    $period = $Param['period'];
    $plan_max_hour = $Param['plan_max_hour'];
    $max_hour = $Param['max_hour'];
    $plan_term = $Param['plan_term'];

    if(!empty($login) and !empty($name) and !empty($location) and !empty($mail) and !empty($contact) and !empty($target) and
        !empty($object) and !empty($where) and !empty($rights) and !empty($period) and !empty($plan_max_hour) and !empty($max_hour) and !empty($plan_term)){
        $orderRequest = R::dispense('order');
        $orderRequest->login = $login;
        $orderRequest->name = $name;
        $orderRequest->location = $location;
        $orderRequest->mail = $mail;
        $orderRequest->contact = $contact;
        $orderRequest->target = $target;
        $orderRequest->object = $object;
        $orderRequest->where = $where;
        $orderRequest->rights = $rights;
        $orderRequest->period = $period;
        $orderRequest->plan_max_hour = $plan_max_hour;
        $orderRequest->max_hour = $max_hour;
        $orderRequest->plan_term = $plan_term;
        R::store($orderRequest);
        $response["error"] = FALSE;
        $response["error_msg"] = "The application was successfully downloaded to the database! РУсский";
        echo json_encode($response, JSON_UNESCAPED_UNICODE).'<br>';
        echo $target;
    }else{
        $response["error"] = TRUE;
        $response["error_msg"] = "Not all fields are filled!";
        echo json_encode($response);
    }
}


?>
</body>
</html>
