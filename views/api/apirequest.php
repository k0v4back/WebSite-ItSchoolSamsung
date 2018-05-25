<?php
if ($_SERVER['REQUEST_URI'] == '/') {
    $Page = 'index';
    $Module = 'index';
} else {
    $URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $URL_Parts = explode('/', trim($URL_Path, ' /'));
    $Page = array_shift($URL_Parts);
    $Module = array_shift($URL_Parts);


    if (!empty($Module)) ;
    $Param = array();
    for ($i = 0; $i < count($URL_Parts); $i++) {
        $Param[$URL_Parts[$i]] = $URL_Parts[++$i];
    }
}


function Error($p1, $p2)
{
    exit('{"error:"' . $p1 . ',"text":"' . $p2 . '"}');
}

if ($Module == 'request') {
    if (!$Param['email']) Error(1, 'Не указан email пользователя');
    if (!$Param['text']) Error(2, 'не указан текст сообщения');
//    $login = $Param['email'];

//    $user = R::findOne('users', 'login = ?', array($login));
//    $history = R::getAll('SELECT `login`, `time`, `sum` FROM `history_payment` WHERE id > ?', array(0));
//    echo json_encode(array("histories"=>$history));

    echo $Param['email'] . ' - email пользователя<br>';
    echo $Param['text'] . ' - Текст сообщеня<br>';


    //---------------------------------------------

    require 'phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    $mail->isSMTP();

    $from = $Param['email'];
    $message = $Param['text'];
    $email = $Param['email'];


    $mail->Host = 'gasprosto.ru';
    $mail->SMTPAuth = true;
    $mail->Username = 'admin@gasprosto.ru';//Логин от вышей почты
    $mail->Password = '_n5dLImF'; //Пароль от вышей почты
    $mail->SMTPSecure = 'ssl';
    $mail->Port = '465';


//Заголовочная инфа (от кого и т.д)
    $mail->CharSet = 'UTF-8';
    $mail->From = $from;
//Инфа на кому будет отправлено письмо
    $mail->AddAddress('admin@gasprosto.ru', 'Вадим');//1-адрес кому будет отправлено письмо, 2-имя(не обязательно)

    $mail->isHTML(true);//В формате txt или html


//Параметры письма (тема, текст)
    $mail->Subject = 'Письмо с заявкой';
    $mail->Body = $message . '<br>';
    $mail->AltBody = $message;//Альтернативный показ письма. НУжно для того если текст письма не показаля в html то покажется в txt


    if( $mail->send() ){
        echo 'Письмо отправлено успешно!';
    }else{
        echo 'Возникла ошибка при отправки';
        //echo $mail->ErrorInfo;
    }
}


?>

