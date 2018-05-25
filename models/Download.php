<?php

class Download
{
    public static function getDownload()
    {
        $uploaddir = 'views/download/images/';
        // это папка, в которую будет загружаться картинка
        $apend = rand(100, 1000) . '.jpg';
        // это имя, которое будет присвоенно изображению
        $uploadfile = "$uploaddir$apend";
        //в переменную $uploadfile будет входить папка и имя изображения

        // В данной строке самое важное - проверяем загружается ли изображение (а может вредоносный код?)
        // И проходит ли изображение по весу. В нашем случае до 512 Кб
        if(isset($_POST['upload'])){
        if (($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size'] != 0 and $_FILES['userfile']['size'] <= 5120000)) {
            // Указываем максимальный вес загружаемого файла. Сейчас до 512 Кб
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                //Здесь идет процесс загрузки изображения
                $size = getimagesize($uploadfile);

                return $size;

            }
        }
        }
    }
}


?>