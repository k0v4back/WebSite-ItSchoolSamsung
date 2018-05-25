<?php include ROOT.'/views/layouts/header.php'; ?>

  <?php include ROOT.'/views/layouts/underheader.php';?>





  	<div class="pen-title" style="padding-top: 30%">
  
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Click Me</div>
  </div>
  <div class="form">



    <h2>Create an account</h2>
    <form action="/reg" method="POST">
      <input type="text" name="login" required="required" placeholder="Username"/>
      <input type="email" name="email" required="required" placeholder="Email Address"/>
      <input type="password" name="password" required="required" placeholder="Password"/>
      <a href="/"><button type="submit" name="do_signup">Register</button></a>
    </form>


    <?php
    //Регистрация пользователя
    $date = $_POST;
    if(isset($date['do_signup'])){
    	$errors = array();
    	$login = $date['login'];
    	$email = $date['email'];
    	$password = $date['password'];

		$сhecklogin = R::find('users', 'login = ?', array($login));
		if($сhecklogin == array()){	
		}else{
			$errors[] = 'Такой ник уже существует';
			?>
			<script> alert('Такой ник уже существует');</script> 
			<?php
		}

		$сheckemail = R::find('users', 'email = ?', array($email));
		if($сheckemail == array()){	
		}else{
			$errors[] = 'Такой email уже существует';
			?>
			<script> alert('Такой email уже существует');</script> 
			<?php
		}

		$сheckpassword = R::find('users', 'password = ?', array($password));
		if(iconv_strlen($password) < 6){	
			$errors[] = 'Пароль короче 6 символов';
			?>
			<script> alert('Пароль короче 6 символов');</script> 
			<?php
		}else{

		}

    	if(empty($errors)){
    		$user = R::dispense('users');
    		$user->login = $login;
    		$user->email = $email;
    		$user->password = password_hash($password, PASSWORD_DEFAULT);
			R::store($user);
			?>
			<script> alert('Вы успешно зарегистрированы!');</script> 
			<?php
			echo '<div  align="center" style="padding-top:20px"><a href="http://newsportal/vhod" style="color:green"><font size="3">Нажмите для входа на сайт</font></a></div>';
    	}else{
    		?>
			<script> alert('Возникла ошибка при регистрации!');</script> 
			<?php
    	}

    }

    ?>





  </div>
  <div class="cta"><a href="http://andytran.me">Forgot your password?</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://codepen.io/andytran/pen/vLmRVp.js'></script>

  

    <script>// Toggle Function
$('.toggle').click(function(){
  // Switches the Icon
  $(this).children('i').toggleClass('fa-pencil');
  // Switches the forms  
  $('.form').animate({
    height: "toggle",
    'padding-top': 'toggle',
    'padding-bottom': 'toggle',
    opacity: "toggle"
  }, "slow");
});</script>
  


        
      <!-- <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
              <li>
                <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="template/images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="template/images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="template/images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="template/images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>
            </ul>
          </div> -->
          
  <?php include ROOT.'/views/layouts/footer.php'; ?>