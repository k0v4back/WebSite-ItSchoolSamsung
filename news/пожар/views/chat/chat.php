<?php
    //echo $_SESSION['logged_user']->login;
    if(!isset($_SESSION['logged_user'])){
      ?>
      <script type="text/javascript">alert('Для того чтобы отправить сообщение в чат вам нужно зарегистрироваться или войти в свой аккаунт!')</script>
      <?php
    }else{
      if(isset($_POST['submitmsg'])){
        if(!empty($_POST['text'])){
        
      $user = R::dispense('chat');
      $user->login = $_SESSION['logged_user']->login;
      $user->text = $_POST['text'];
      $user->date = date("Y-m-d H:i:s");
      R::store($user);
      exit(header('location: /chat'));
        }
      } 
  }



    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat</title>
<link rel="stylesheet" type="text/css" href="template/assets/css/styleforchat.css">
</head>
 
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <?php if(isset($_SESSION['logged_user'])){ echo $_SESSION['logged_user']->login;}else{echo "anonim";}?>!</b></p>
        <p class="logout" style="word-spacing: 7px;"><a id="exit" href="/"> Home</a></p>
        <p class="logout" style="word-spacing: 7px;">
        <?php  
                if(!isset($_SESSION['logged_user'])){
                  ?>
                    <a href="/vhod">Войти</a>
                    <a href="/reg">Регистрация</a>
                  <?php
                }else{
                  ?>
                    <a href="/exit">Выйти</a>
                    <a href="/cabinet"><?php echo $_SESSION['logged_user']->login; ?></a></li>
                  <?php
                }
              ?></p>
        <div style="clear:both"></div>

    </div>
    <div id="chatbox">
      <a href="#bottom">Вниз</a>
      <a name="top"></a>

     	<?php
     	$result = R::getAll('SELECT * FROM `chat` ORDER BY `id` LIMIT 50');
		foreach ($result as $key => $value) {
		  ?>
		  	
    			<div style="background: #EDEDED; padding: 5px;  border-radius: 10px; margin: 8px; word-wrap: break-word;">
    				<strong><?php echo $value['login'];?></strong>
    				<i style="align-items: right;"><?php echo $value['date'];?></i>
    				<? 
    				echo '<br>';
    				echo $value['text'];

    				?>
    				
    			</div>
    		
		  <?php
		}

     	?>
      <a name="bottom"></a>
      <a href="#top">Вверх</a>
     	</div>

     	

     
    <form method="POST" action="/chat">
        <input name="text" type="text" id="usermsg" size="63" />
        <button type="submit" name="submitmsg">Send</button>
    </form>

</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document

</script>
</body>

</html>
