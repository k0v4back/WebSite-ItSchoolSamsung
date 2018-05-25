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
    if(!$Param['seria']) Error(2, json_encode('Не указана серия паспорта'));
    if(!$Param['number']) Error(3, json_encode('Не указан номер паспорта'));
    if(!$Param['gived']) Error(4, json_encode('Не указано кем выдан паспорт'));
    if(!$Param['place']) Error(5, json_encode('Не указана дата выдачи'));


    $login = $Param['login'];
    $series = $Param['seria'];
    $number = $Param['number'];
    $issued = $Param['gived'];
    $date = $Param['place'];


    $finde = R::findOne('pasport', 'login = ?', array("$login"));
    $finde2 = R::findOne('pasport', 'full_name = ?', array("$login"));
    if(!empty($finde) and !empty($finde2)){
        $finde3 = R::load('pasport', $finde->id);
        $finde3->login =$login;
        $finde3->series = $series;
        $finde3->number = $number;
        $finde3->issued = $issued;
        $finde3->date = $date;
        R::store($finde3);
        $response["error"] = FALSE;
        $response["error_msg"] = "User data updated successfully!";
        echo json_encode($response);
    }else{
        $pasport = R::dispense('pasport');
        $pasport->login =$login;
        $pasport->series = $series;
        $pasport->number = $number;
        $pasport->issued = $issued;
        $pasport->date = $date;
        R::store($pasport);
        $response["error"] = FALSE;
        $response["error_msg"] = "User data was successfully added!";
        echo json_encode($response);
    }
}


?>
