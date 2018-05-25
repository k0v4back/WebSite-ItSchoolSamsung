<?php

include_once ROOT.'/models/Registr.php';

class RegisterController{
public function actionIndex()
    {

		$key = Reg::checkCode();

		require ROOT.'/views/avtoriz/register.php';
		return true;
	}

	public function actionRegtwo()
    {
        require ROOT.'/views/avtoriz/register2.php';
        return true;
    }

}