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

    </style>

    </body>


    <?php

        $login = $_SESSION['logged_user']['login'];
        $finde = R::findOne('users', 'login = ?', array("$login"));
        $finde2 = R::load('users', $finde->id);
    ?>


    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span2">
                <b>Ваше имя: <?php echo $finde2['login']; ?></b>
            </div>
            <div class="span2">
                <b>Адрес: <?php echo $finde2['adres']; ?></b>
            </div>
            <!--<div class="span2">
                <b>Телефон: <?php echo $finde2['phone']; ?></b>
            </div>-->
            <div class="span10">
                <form method="post" action="/cabinet">
                    <span><b>Телефон:</b></span>
                    <input type="text" name="cred_num" placeholder="Телефон" value="<?php echo $finde2['phone']; ?>" required/>
                    <input type="submit" name="change" value="Изменить">
                </form>
                <?php
                if(isset($_POST['change'])){
                	$finde2 = R::dispense('users');
                    $finde2->phone = $finde2['phone'];
                    R::store($finde2);

                    echo 'good';
                    echo $finde2['phone'];
                }else{
                	echo $finde2['phone'];
                }

                ?>
            </div>
            <br>

    <div class="col-lg-6 col-sm-12">
        <div class="payment-main-block-right">
            <h4>История платежей</h4>
            <table class="table table-inverse" style="border: 3px solid black; border-radius: 50px 50px 50px 50px;">
                <thead>
                <tr>
                    <th>Имя покупателя</th>
                    <th>Дата</th>
                    <th>Сумма(руб)</th>
                </tr>
                </thead>
                <tbody>
                <!-- <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  </tr> -->
                <?php
                $login = $_SESSION['logged_user']['login'];
//                echo $login;
                // $history = R::find('payment', 'id >? AND `login` = "$login"', array(0));
                $history = R::find('history_payment', 'login = ?', array("$login"));
                foreach($history as $value){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $value['login']; ?></th>
                        <td><?php echo $value['time']; ?></td>

                        <td><?php echo $value['sum']; ?></td>


                    </tr>

                    <?php	// echo $value->name.'<br>';
                }
                //echo $_COOKIE['logged_user'];
                ?>
                <!-- <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
              </tr> -->
                </tbody>
            </table>
        </div>
    </div>

        </div>
    </div>

    </body>





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