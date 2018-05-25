<?php

include ROOT . '/views/layouts/header.php';
?>

    <head>


    <body id="page-top">
    <?php

    include ROOT . '/views/layouts/navigator2.php';
    ?>

    <br>
    <br>
    <br>


    </body>
    <div class="container-fluid">
        <div class="row">
            <div style="background-color: #EFF0F1; padding: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 10px; border-radius: 10px;"
                 class="col col-md-5 col-xs-5">
                <div class="span2">
                    <b>Ваше имя: <?php echo $cabinet['name']; ?></b>
                </div>
                <div class="span2">
                    <b>Адрес: <?php echo $cabinet['address']; ?></b>
                </div>
                <div class="span10">
                    <div class="col-xs-4">
                        <form method="post" action="/cabinet">
                            <span><b>Телефон:</b></span>
                            <input type="text" name="phone" placeholder="Телефон"
                                   value="<?php echo $cabinet['phone']; ?>"/><br>
                            <span><b>Логин:</b></span>
                            <input type="text" name="login" placeholder="Логин"
                                   value="<?php echo $cabinet['login']; ?>"/><br>
                            <!--                <span><b>Пароль:</b></span>-->
                            <!--                <input type="text" name="password" placeholder="Пароль" value="-->
                            <?php //echo $cabinet['password']; ?><!--" /><br>-->
                            <button type="submit" name="change" class="btn btn-success" value="Изменить"
                                    style="margin-top: 10px;">Изменить
                            </button>
                        </form>

                        <?php
                        if (isset($_POST['change'])) {
                            $cabinet->phone = $_POST['phone'];
                            $cabinet->login = $_POST['login'];
                            R::store($cabinet);
                            $_SESSION['logged_user']['login'] = $_POST['login'];
                        }

                        ?>

                    </div>
                </div>
            </div>
            </br>
            </br>


            <!--        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModal">Оформить заявку</button>-->
            <div class="col-md-6">
                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModal"
                        style="margin-bottom: 10px;">Оформить заявку
                </button>
                <?php
                if (isset($_POST['go'])) {
                if (!empty($_POST['name']) && !empty($_POST['location']) && !empty($_POST['mail']) && !empty($_POST['contact']) && !empty($_POST['target']) && !empty($_POST['object']) && !empty($_POST['where']) && !empty($_POST['rights'])
                    && !empty($_POST['period']) && !empty($_POST['max_hour']) && !empty($_POST['plan_term'])) {

                    $login = $_SESSION['logged_user']->login;
                    $name = $_POST['name'];
                    $location = $_POST['location'];
                    $mail = $_POST['mail'];
                    $contact = $_POST['contact'];
                    $target = $_POST['target'];
                    $object = $_POST['object'];
                    $where = $_POST['where'];
                    $rights = $_POST['rights'];
                    $period = $_POST['period'];
                    $plan_max_hour = $_POST['plan_max_hour'];
                    $max_hour = $_POST['max_hour'];
                    $plan_term = $_POST['plan_term'];

                    $orderRequest = R::dispense('order');
                    $orderRequest->login = $login;
                    $orderRequest->name = $name;
                    $orderRequest->location = $location;
                    $orderRequest->mail = $mail;
                    $orderRequest->contact = $contact;
                    $orderRequest->target = $target;
                    $orderRequest->object = $object;
                    $orderRequest->where = $where;
                    $orderRequest->rights = $rights;
                    $orderRequest->period = $period;
                    $orderRequest->plan_max_hour = $plan_max_hour;
                    $orderRequest->max_hour = $max_hour;
                    $orderRequest->plan_term = $plan_term;
                    $orderRequest->status = 'В процессе обработки.';
                    R::store($orderRequest);


                    // echo gettype($mail);
                    // $_POST['mail'] = $mail2;

                    $mail2 = strval($mail);

                    require 'phpmailer/PHPMailerAutoload.php';
                    $mail = new PHPMailer;
                    $mail->CharSet = 'UTF-8';
                    $mail->setFrom('admin@gasprosto.ru', 'GasProsto.ru');
                    $mail->addAddress("$mail2", "$name");
                    $mail->Subject = "Данные заявки";
//                    $mail->Body     = 'Код подтверждения о востановлении пароля: '. $password;
                    $mail->Body = 'Тут будет текст-инструкция о заявке';
                if (!$mail->send()) {
                    ?>
                    <script> alert('При отправки письма возникла ошибка!');</script>
                <?php
                } else {
                ?>
                    <script> alert('Письмо отправлено успешно, мы скоро вам ответим!');</script>
                <?php
                }

                } else {
                ?>
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Возникла ошибка при отправки заявки!
                    </div>
                <?php


                }
                ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Поздравляем!</strong> Ваша заявка успешно отправлена.
                    </div>
                    <?php

                }


                ?>
            </div>
            <div class="col col-md-6">
                <div id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Заявка</h4>
                                <button class="close" type="button" data-dismiss="modal">×</button>
                            </div>


                            <form style="padding: 10px" method="post" action="/cabinet">
                                <div class="form-group">
                                    <label for="inputEmail">Имя:</label>
                                    <input type="text" class="form-control" name="name" placeholder="Введите ваше имя" value="Вадим">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Место жительства:</label>
                                    <input type="text" class="form-control" name="location"
                                           placeholder="Введите место жительства">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Адрес:</label>
                                    <input type="text" class="form-control" name="mail" placeholder="Введите адрес">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Адрес mail:</label>
                                    <input type="email" class="form-control" name="email" placeholder="Введите email">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Контакты:</label>
                                    <input type="text" class="form-control" name="contact"
                                           placeholder="Введите контакты">
                                </div>
                                <!--                <div class="form-group">-->
                                <!--                    <label for="inputEmail">Адрес email:</label>-->
                                <!--                    <input type="email" class="form-control" name="email"  placeholder="Введите email">-->
                                <!--                </div>-->
                                <div class="form-group">
                                    <label for="inputEmail">Цели работ:</label>
                                    <input type="text" class="form-control" name="target"
                                           placeholder="Введите цели работ">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Объект работы:</label>
                                    <input type="text" class="form-control" name="object"
                                           placeholder="Введите объект работы">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Где находится объект:</label>
                                    <input type="text" class="form-control" name="where"
                                           placeholder="Введите где находится объект">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Права:</label>
                                    <input type="text" class="form-control" name="rights" placeholder="Введите права">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Период:</label>
                                    <input type="text" class="form-control" name="period" placeholder="Введите период">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Планируемый срок вывода в эксплуатацию объекта:</label>
                                    <input type="text" class="form-control" name="plan_max_hour"
                                           placeholder="Введите планируемый срок вывода в эксплуатацию объекта">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Максимальная величиа расхода на газ:</label>
                                    <input type="text" class="form-control" name="max_hour"
                                           placeholder="Введите максимальную величину расхода на газ">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Планируемый срок:</label>
                                    <input type="text" class="form-control" name="plan_term"
                                           placeholder="Введите планируемый срок">
                                </div>


                                <button type="submit" name="go" class="btn btn-success">Отправить заявку</button>
                            </form>

                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <br>
                <!--        --><?php
                //        if(isset($_POST['go'])) {
                //            if (!empty($_POST['name']) && !empty($_POST['location']) && !empty($_POST['mail']) && !empty($_POST['contact']) && !empty($_POST['target']) && !empty($_POST['object']) && !empty($_POST['where']) && !empty($_POST['rights'])
                //                && !empty($_POST['period']) && !empty($_POST['max_hour']) && !empty($_POST['plan_term'])) {
                //
                //                $login = $_SESSION['logged_user']->login;
                //                $name = $_POST['name'];
                //                $location = $_POST['location'];
                //                $mail = $_POST['mail'];
                //                $contact = $_POST['contact'];
                //                $target = $_POST['target'];
                //                $object = $_POST['object'];
                //                $where = $_POST['where'];
                //                $rights = $_POST['rights'];
                //                $period = $_POST['period'];
                //                $plan_max_hour = $_POST['plan_max_hour'];
                //                $max_hour = $_POST['max_hour'];
                //                $plan_term = $_POST['plan_term'];
                //
                //                $orderRequest = R::dispense('order');
                //                $orderRequest->login = $login;
                //                $orderRequest->name = $name;
                //                $orderRequest->location = $location;
                //                $orderRequest->mail = $mail;
                //                $orderRequest->contact = $contact;
                //                $orderRequest->target = $target;
                //                $orderRequest->object = $object;
                //                $orderRequest->where = $where;
                //                $orderRequest->rights = $rights;
                //                $orderRequest->period = $period;
                //                $orderRequest->plan_max_hour = $plan_max_hour;
                //                $orderRequest->max_hour = $max_hour;
                //                $orderRequest->plan_term = $plan_term;
                //                R::store($orderRequest);
                //                ?>
                <!--                <div class="alert alert-success">-->
                <!--                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                <!--                    <strong>Поздравляем!</strong> Ваша заявка успешно отправлена.-->
                <!--                </div>-->
                <!--                --><?php
                //            } else {
                //                ?>
                <!--                <div class="alert alert-danger">-->
                <!--                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                <!--                    Возникла ошибка при отправки заявки!-->
                <!--                </div>-->
                <!--                --><?php
                //
                //
                //            }
                //        }
                //
                //
                //        ?>
            </div>

            <br>


            <?php
            if (!empty($request_order)){
                ?>

                <div class="col-lg-6 ">
                    <div class="payment-main-block-right">
                        <h4>История заявок</h4>
                        <div class="table-responsive">
                            <table class="table table-hover "
                                   style="border: 3px solid black; border-radius: 50px 50px 50px 50px;">
                                <thead>
                                <tr>
                                    <th>Имя отправителя</th>
                                    <th>Дата</th>
                                    <th>Стутус</th>
                                    <?php
                                    if (empty($find_status_order)) {
//                            var_dump($find_status_order);
                                    } else {
                                        ?>
                                        <th>Файл</th>
                                        <?php
                                    }
                                    ?>
                                    <!--                        <th>Файл</th>-->
                                </tr>
                                </thead>
                                <tbody class=".table-hover">


                                <?php
                                foreach ($request_order as $value) {
                                    ?>

                                    <tr>
                                        <td scope="row"><?php echo $value['name']; ?></td>
                                        <td><?php echo $value['date']; ?></td>
                                        <td scope="row"><?php echo $value['status']; ?></td>
                                        <?php
                                        if ($value['status2'] == 0) {
                                            ?>
                                            <td scope="row">Нету</td>
                                            <?php
                                        } else {
                                            ?>
<!--                                            <a href="files/documents/--><?php //echo $value['file']; ?><!--" download>-->
                                            <td><a href="/pdf" download>
                                                    <button class="btn btn-success"><?php echo 'Загрузить'; ?></button>
                                                </a></td>
                                            <?php
                                        }
                                        ?>
                                        <!--                            <td><button class="btn btn-success">-->
                                        <?php //echo 'Загрузить';
                                        ?><!--</button></td>-->

                                    </tr>

                                    <?php
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <?php
            }else
            ?>


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

include ROOT . '/views/layouts/footer.php';
?>