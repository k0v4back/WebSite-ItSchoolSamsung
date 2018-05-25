<?php

unset($_SESSION['logged_user']);
if(empty($_SESSION['logged_user'])){
	header("Location: /");
}

?>