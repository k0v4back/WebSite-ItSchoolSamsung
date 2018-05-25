<?php
//Model Registr.php of RegisterController

class Reg{
	public static function checkCode(){
            if(isset($_POST['submit'])){
              $key = $_POST['key'];

              $good_key = R::findOne('users', 'unique_id = ?', array($key));
              if($good_key){

                $finde = R::findOne('users', 'unique_id = ?', array($key));
                $finde2 = R::load('users', $finde->id);
                $finde2->first_entry = 1;
                R::store($finde2);

                $_SESSION['logged_user'] = $finde;
                $result = 'Good';
                return $result;
              }else{
                // $result = 'Этого кала нет в БД';
                // return $result;
              }
        }
	}
}
?>