<?php
require('fpdf/fpdf.php');
require('list.class.php');

//$list = new ListDoc();
////Добавляем страничку в документ
//$list->AddPage();
////Выводим заголовок, используя написанный нами метод в файле класса //price.class.php
//$list->PrintTitle('Test message');
////Выводим документ в браузер
//$list->Output();

if(isset($_SESSION['logged_user']->login)){
    $info = $_SESSION['logged_user']->login;
}else{
    $info = true;
}


$header = array("Name","Rozn. price","Opt. price");
$price=new Price();

//Получим массив данных из файла в $data
$data = $price->LoadData("price.csv");
$price->AddPage();
$price->SetFont('Arial','B',16);
$price->PrintTitle("Your login is - $info");

//Нарисуем таблицу. Аргументами метода являются массив наименований
// столбцов и массив данных из файла price.csv
//$price->ImprovedTable($header,$data);
$price->Output('D', 'request.pdf');
?>
