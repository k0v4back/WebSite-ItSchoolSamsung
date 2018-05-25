<?php
function goComment($id)
{
    header("Location: http://itschoolsamsungprogect/new/$id");
}

include ROOT . '/views/layouts/header.php';
?>

    <head>
        <br>
        <br>
        <br>


    <body id="page-top">
    <?php

    include ROOT . '/views/layouts/navigator2.php';
    ?>
    <div class="progress-container">
        <div class="progress-bar" id="myBar"> </div>
    </div>


    <style>
        a.news {
            font-size: 1.8em;
            color: black;
            font-family: 'Francois One', sans-serif;
            font-weight: normal;
        }

        a {
            color: black;
            font-size: 1.0em;
        }

        a:hover {
            color: #818283;
            text-decoration: none;
        }

        a.news:hover {
            color: #818283;
            text-decoration: none;
            transition: 0.2s linear;
        }

        img {
            display: block;
            max-width: 100%;
            max-height: 100%;
        }

        .center {
            margin: auto; /* Выравниваем по центру */
        }

        .top_news {
            background-color: #F8F9FA;
            padding: 10px;
            border: 0px solid black;
            border-radius: 10px;
            background-color: #F8F9FA;
            padding: 10px;
            border: 0px solid black;
            border-radius: 10px;
        }

        .progress-container{
            width: 100%;
            height: 8px;
            background: #ccc;
            left: 0;
            top: 53px;
            right: 0;
            position: fixed;
            z-index: 1;

        }

        .progress-bar {
            height: 8px;
            background: #4caf50;
            width: 0%;
        }


    </style>


    <div style="width: 95%; margin: 0 auto;">
        <div class="row" style="padding-left: 10px; padding-right: 10px;">
            <!-- Вывод списка новостей-->

            <div class="col-lg-8 col-md-8 col-sm-8">
                <div style="background-color: #FFF; border: 0px solid black; border-radius: 10px;">
                    <div style="margin: 10px">
                        <a class="news"><?php echo $newsItem['title']; ?></a>
                        <p><?php echo $newsItem['pubdate']; ?></p>
                        <p>
                            <img class="img" src="../template/img/news/<?php echo $newsItem['image']; ?>" alt="Картинка"
                                 title="<?php echo $newsItem['title']; ?>">
                        </p>
                        <p><?php echo $newsItem['text'] ?></p>
                        <div style="border: 1px solid #e5e9eb; padding: 0px; width: 150px; padding: 10px; text-align: center">
                            <i class="fas fa-comment-alt"> <?php echo $col[0]['COUNT(*)'] ?> </i>
                            <i class="fas fa-eye" style="padding-left: 10px"> <?php echo $newsItem['views'] ?></i>
                        </div>
                        <br>
                    </div>
                    <h4>Комментарии <?php echo $col[0]['COUNT(*)'] ?></h4>
                    <hr>

                    <?php foreach ($comment as $com) : ?>
                        <div style="background-color: ; padding: 10px">
                            <b><?php echo $com->name; ?> </b>
                            <text> <?php echo $com->date; ?></text>
                            <br>
                            <text><?php echo $com->text; ?></text>
                        </div>
                    <?php endforeach; ?>
                    <hr>


                    <?php
                    if (!empty($_SESSION['logged_user']['login'])) {
                        ?>

                        <div>
                            <?php $id = explode('/', $_SERVER['REQUEST_URI']);
                            ?>
                            <form method="post" action="/new/<?php echo $id[2] ?>">
                                <div class="form-group">
                                    <label for="inputEmail" style="font-weight: bold">Текст комментария:</label><br>
                                    <textarea id="message" name="message" autocomplete="off" class="form-control"
                                              rows="5" placeholder="Ваш комментарий" required=""></textarea>
                                </div>
                                <button type="submit" name="send" class="btn btn-default">Отправить</button>
                            </form>
                        </div>
                    <br>
                    <br>
                    <br>


                    <?php
                    if (isset($_POST['send'])) {
                    $errors = array();
                    if (empty($_POST['message'])) {
                        $errors = "Введите свой комментарий";
                    }
                    if (empty($errors)) {
                    $id = explode('/', $_SERVER['REQUEST_URI']);
                    $user = R::dispense('comments');
                    $user->name = $_SESSION['logged_user']['login'];
                    $user->text = $_POST['message'];
                    $user->id_new = $id[2];
                    R::store($user);
                    //                        goComment($id[2]);
                    ?>
                        <div class="alert alert-success">
                            Комментарий успешно добалвен!
                        </div>
                    <?php
                    } else {
                    ?>
                        <script>alert('Введите свой комментарий!');</script>
                    <?php
                    }
                    }
                    }else{
                    ?>
                        <div class="alert alert-danger">
                            Только полноправные пользователи могут оставлять комментарии. <a href="/login"
                                                                                             style="font-weight: bold">Войдите</a>,
                            пожалуйста.
                        </div>
                        </br>
                        </br>
                        <?php
                    }


                    ?>


                </div>
            </div>

            <?php
            //            $id = explode('/', $_SERVER['REQUEST_URI']);
            //            echo $id[2];

            ?>

            <!-- Вывод топ новостей-->
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="top_news">
                    <div>
                        <div class="center">
                            <h4>Топ читаемых новостей</h4>

                            <?php foreach ($newsViews as $news_views) : ?>
                                <div style="background-color: #FFF; border: 0px solid black; border-radius: 10px">
                                    <div style="margin: 10px">
                                        <a href="/new/<?php echo $news_views['id']; ?>"
                                           class="news"><?php echo $news_views['title'] ?></a>
                                        <p>
                                            <img class="img"
                                                 src="../template/img/news/<?php echo $news_views['image']; ?>"
                                                 alt="Картинка" title="<?php echo $news_views['title']; ?>">
                                        </p>
                                        <text><?php echo substr($news_views['text'], 0, 100) ?><a
                                                    href="/new/<?php echo $news_views['id']; ?>">...</a></text>
                                        <br>
                                        <?php
                                        $col = R::getAll('SELECT COUNT(*) FROM `comments` WHERE `id_new` = ?', array($news_views['id']));
                                        ?>
                                        <i class="fas fa-comment-alt"> <?php echo $col[0]['COUNT(*)'] ?> </i>
                                        <i class="fas fa-eye"
                                           style="padding-bottom: 10px"><?php echo $news_views['views'] ?> </i>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onscroll = function () {
            docScroll();
        }

        function docScroll() {
            let windowScroll = document.body.scrollTop || document.documentElement.scrollTop,
                documentHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight,
                scrolled = (windowScroll / documentHeight) * 100;

            document.getElementById('myBar').style.width = scrolled + '%';
        }

        docScroll();
    </script>


    </body>


    <br>
    <br>
    <br>
    <br>


<?php

include ROOT . '/views/layouts/footer.php';
?>