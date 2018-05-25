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
    if ($Module == 'login') {
        if (!$Param['login']) Error(1, 'Не указан логин пользователя');
        $login = $Param['login'];

        $user = R::findOne('users', 'login = ?', array($login));
        $history = R::getAll('SELECT `login`, `time`, `sum` FROM `history_payment` WHERE id > ?', array(0));
        echo json_encode(array("histories"=>$history));
    }

?>