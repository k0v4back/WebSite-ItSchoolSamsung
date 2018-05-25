<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">GasProsto.ru</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link js-scroll-trigger" href="#services">Services</a>-->
<!--                </li>-->
                <!-- <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
                </li> -->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link js-scroll-trigger" href="#about">About</a>-->
<!--                </li>-->
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#team">Команда</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Контакты</a>
                </li>
                <li class="nav-item" style="padding-right: 100px;">
                    <a class="nav-link js-scroll-trigger" href="/new">Новости</a>
                </li>
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link js-scroll-trigger" href="/download">Download</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link js-scroll-trigger" href="#about"></a>-->
<!--                </li>-->
                <!-- <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="/login">Войти</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="/register">Регистрация</a>
                </li> -->



                <?php
                if(!isset($_SESSION['logged_user'])){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="/login">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="/register">Регистрация</a>
                    </li>
                    <?php
                }else{
                    ?>

                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="/exit">Выйти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="/cabinet"><?php echo $_SESSION['logged_user']->login; ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
