<!DOCTYPE html>
<html>
<head>
  <base href="/">
<title>NewsFeed</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="template/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="template/assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="template/assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="template/assets/css/font.css">
<link rel="stylesheet" type="text/css" href="template/assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="template/assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="template/assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="template/assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="template/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="template/assets/css/reg.css">
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="/">Home</a></li>
              <li><a href="/about">About</a></li>
              <li><a href="/contact">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right" style="padding-left: 29%">
            <ul class="top_nav">
              <?php
                if(!isset($_SESSION['logged_user'])){
                  ?>
                    <li><a href="/vhod">Войти</a></li>
                    <li><a href="/reg">Регистрация</a></li>
                  <?php
                }else{
                  ?>
                    <li><a href="/exit">Выйти</a></li>
                    <li alt="Ваш личный кабинет"><a href="/cabinet"><?php echo $_SESSION['logged_user']->login; ?></a></li>
                  <?php
                }
              ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="/" class="logo"><img src="template/images/logo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="template/images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>