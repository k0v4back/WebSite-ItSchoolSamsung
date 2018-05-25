<?php

class PdfController{
    public function actionIndex(){
        require ROOT.'/views/pdf/index.php';
        return true;
    }
}

?>