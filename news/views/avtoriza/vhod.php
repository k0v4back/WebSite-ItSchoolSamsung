<?php include ROOT.'/views/layouts/header.php'; ?>

  <?php include ROOT.'/views/layouts/underheader.php'; ?>





<div class="pen-title">
  <h1>Flat Login Form</h1><span></span>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Click Me</div>
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form action="/vhod" method="POST">
      <input type="text" name="login" placeholder="Username"/>
      <input type="password" name="password" placeholder="Password"/>
      <a href="/cabinet"><button type="submit" name="vhod">Login</button>
    </form>

    <?php
    //Вход на сайт
    $date = $_POST;
    if(isset($date['vhod'])){
      $errors = array();
      $login = $date['login'];
      $password = $date['password'];

      $user = R::findOne('users', 'login = ?', array($login));
      if($user){
        if(password_verify($password, $user->password)){
          //Пароль совпадает, залогиним пользователя
          echo '<div  align="center" style="padding-top:20px"><a href="http://newsportal/cabinet" style="color:green"><font size="3">Нажмите для входа в личный кабинет</font></a></div>';
          //Запомним пользователя
          $_SESSION['logged_user'] = $user;
        }else{
          //Пароль не совпадет, выведем ошибку
          $errors[] = 'Пароль введён неверно!';
          ?>
          <script> alert('Пароль введён неверно!');</script> 
        <?php
        }
      }else{
        $errors[] = 'Пользователь не найден';
        ?>
          <script> alert('Пользователь не найден');</script> 
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

