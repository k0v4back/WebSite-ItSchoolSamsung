<?php
include ROOT.'/views/layouts/header.php';
?>
    <head>



    <body id="page-top">
    <?php
    include ROOT.'/views/layouts/navigator2.php';
    ?>

    <br>
    <br>
    <br>




    <style type="text/css">


        .login {
            width: 340px;
            background-color: #1ea167;
            border-radius: 5px;
            padding: 20px;
            background-image: -webkit-linear-gradient(90deg, #212529, #212529);
            position: absolute;
            left: 50%;
            top: 100px;
            margin-left: -170px;
            box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.2) inset, 0px 0px 2px rgba(0, 0, 0, 0.5);
        }
        .login h2 {
            color: #F2B32B;
            font-size: 20px;
            margin: 0 0 15px;
            text-shadow: 0px -1px rgba(0, 0, 0, 0.5);
        }
        .login form {
            border: 0;
            padding: 0;
            margin-bottom: 10px;
        }
        .login form input {
            outline: none;
            width: 300px;
            height: 12px;
            display: block;
            background: #43474B;
            border: 1px solid #6D7175;
            margin: 0;
            padding: 13px 15px;
            font-size: 13px;
        }
        .login form input:focus, .login form input:active {
            background-color: #9EA0A6;
        }
        .login form input:nth-child(1) {
            border-radius: 5px 5px 0 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) inset;
        }

        .login form ::-webkit-input-placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        .login input[type="submit"] {
            margin: 0;
            display: block;
            padding: 13px 0;
            margin-top: 10px;
            height: 5%;
            width: 100%;
            font-size: 13px;
            font-weight: bold;
            border: 0;
            text-shadow: 0px 1px 0px rbga(255, 255, 255, 1);
            background-color: #f6ba35;
            background-image: -webkit-linear-gradient(90deg, #eca418, #ffcd4e);
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        }
        .login .utilities {
            margin-top: 20px;
        }
        .login .utilities a {
            color: #61e5ab;
            text-decoration: none;
            font-size: 12px;
            text-shadow: -1px -1px 0 rgba(0, 0, 0, 0.4);
        }
        .login .utilities a:hover {
            color: white;
        }
        .login .utilities a:nth-child(2) {
            display: block;
            float: right;
            width: 50%;
            text-align: right;
        }
        .login:before, .login:after {
            z-index: -1;
            position: absolute;
            content: "";
            left: 5px;
            width: 53%;
            top: 15px;
            height: 80%;
            bottom: 80%;
            max-width: 300px;
            background: rgba(0, 0, 0, 0.7);
            box-shadow: -10px -15px 20px rgba(0, 0, 0, 0.2);
            -webkit-transform: rotate(-3deg);
        }
        .login:after {
            box-shadow: 10px -15px 20px rgba(0, 0, 0, 0.2) !important;
            -webkit-transform: rotate(3deg);
            right: 5px;
            left: auto;
        }


    </style>


    </body>
    <div>
        <div class="login">
            <h2>Добавить пользователя</h2>
            <form action="/add" method="POST">
<!--                <input style="border-radius: 5px 5px 5px 5px;" name="key" required="required" placeholder="Уникальный ключ" />-->
                <input style="border-radius: 5px 5px 0 0;" type="email" name="email" required="required" placeholder="Email"/>
                <input style="border-radius: 0 0 0 0;" type="text" name="login" required="required" placeholder="Логин"/>
                <input style="border-radius: 0 0 0 0;" type="text" name="name" required="required" placeholder="Имя"/>
                <input style="border-radius: 0 0 0 0;" type="text" name="address" required="required" placeholder="Адрес"/>
                <input style="border-radius: 0 0 0 0;" type="password" name="password" required="required" placeholder="Пароль" />
                <input style="border-radius: 0 0 5px 5px;" name="key" required="required" placeholder="Уникальный ключ" />
                <input type="submit" name="add" value="Добавить" />
            </form>
            <!-- <div class="utilities"> -->
            <!-- <a href="#">Forgot Password?</a>
            <a href="#">Sign Up &rarr;</a> -->
            <!-- </div> -->
        </div>
    </div>

<?php

if(isset($_POST['add'])){
    $add = R::dispense('users');
    $add->login = $_POST['login'];
    $add->name = $_POST['name'];
    $add->address = $_POST['address'];
    $add->email = $_POST['email'];
    $add->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $add->unique_id = $_POST['key'];
    R::store($add);
}
?>






    </body>





    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>






    <!-- Bootstrap core JavaScript -->
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="template/js/jqBootstrapValidation.js"></script>
    <script src="template/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="template/js/agency2.min.js"></script>



<?php

include ROOT.'/views/layouts/footer.php';
?>