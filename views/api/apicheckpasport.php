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


if($Module == 'login'){
    if(!$Param['login']) Error(1, json_encode('Не указан логин пользователя'));
    if(!$Param['series']) Error(2, json_encode('Не указана серия паспорта'));
    if(!$Param['number']) Error(3, json_encode('Не указан номер паспорта'));
    if(!$Param['issued']) Error(4, json_encode('Не указано кем выдан паспорт'));
    if(!$Param['date']) Error(5, json_encode('Не указана дата выдачи'));
    if(!$Param['full_name']) Error(6, json_encode('Не указано ФИО'));

    $login = $Param['login'];
    $series = $Param['series'];
    $number = $Param['number'];
    $issued = $Param['issued'];
    $date = $Param['date'];
    $full_name = $Param['full_name'];

    $finde1 = R::findOne('pasport', 'login = ?', array("$login"));
    $finde2 = R::findOne('pasport', 'series = ?', array("$series"));
    $finde3 = R::findOne('pasport', 'number = ?', array("$number"));
    $finde4 = R::findOne('pasport', 'issued = ?', array("$issued"));
    $finde5 = R::findOne('pasport', 'date = ?', array("$date"));
    $finde6 = R::findOne('pasport', 'full_name = ?', array("$full_name"));
    if(!empty($finde1) and !empty($finde2) and !empty($finde3) and !empty($finde4) and !empty($finde5) and !empty($finde6)){
        $response["error"] = FALSE;
        $response["error_msg"] = "Such a user exists!";
        echo json_encode($response);
    }else{
        $response["error"] = TRUE;
        $response["error_msg"] = "There is no such user in the database!";
        echo json_encode($response);
    }
}


?>
