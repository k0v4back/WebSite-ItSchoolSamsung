

<?php

include ROOT.'/views/layouts/header.php';
?>

<head>
<br>
<br>
<br>


<body id="page-top">
<?php

include ROOT.'/views/layouts/navigator2.php';
?>


<style>
    a.news{
        font-size: 1.8em;
        color: black;
        font-family: 'Francois One', sans-serif;
        font-weight: normal;
    }

    a{
        color: black;
        font-size: 1.0em;
    }

    a:hover{
        color: #818283;
        text-decoration: none;
    }

    a.news:hover{
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

    .top_news{
        padding: 10px;
        border: 0px solid black;
        border-radius: 10px;
        background-color: #E0E1E2;
        padding: 10px;
        border: 0px solid black;
        border-radius: 10px;
    }

</style>


</body style="padding-top:1000px;">

<div style="width: 95%; margin: 0 auto;">
    <div class="row" style="padding-left: 10px; padding-right: 10px;">
        <!-- Вывод списка новостей-->

        <div class="col-lg-8 col-md-8 col-sm-8">
            <div style="background-color: #E0E1E2; padding: 10px; border: 0px solid black; border-radius: 10px; margin-bottom: 150px;" class="center">
                <h4 style="">Новости</h4>

                <?php foreach ($newsList as $news) :?>
                <div style="background-color: #FFF; border: 0px solid black; border-radius: 10px;">
                    <div style="margin: 10px">
                        <a href="/new/<?php echo $news->id; ?>" class="news"><?php echo $news->title; ?></a>
                        <p><?php echo $news->pubdate; ?></p>
                        <p>
                            <img class="img" src="../template/img/news/<?php echo $news->image; ?>" alt="Картинка" title="<?php echo $news->title; ?>">
                        </p>
                        <p><?php echo substr($news->text, 0, 300) ?><a href="/new/<?php echo $news->id; ?>" >...</a></p>
                        <div style="border: 1px solid #e5e9eb; padding: 0px; width: 150px; padding: 10px; text-align: center">
                            <?php
                            $col = R::getAll('SELECT COUNT(*) FROM `comments` WHERE `id_new` = ?', array($news->id));
                            foreach ($col as $key => $value) : ?>
                                <i class="fas fa-comment-alt"> <?php echo $value['COUNT(*)']; ?> </i>
                            <?php endforeach; ?>
                            <i class="fas fa-eye" style="padding-left: 10px" alt="Динозаврик"> <?php echo $news->views; ?></i>
                        </div>
                        <br>
                    </div>
                </div>
                <?php endforeach;?>


            </div>
        </div>

        <!-- Вывод топ новостей-->
        <div class="col-lg-4 col-md-4 col-sm-4" >
            <div class="top_news">
                <div>
                    <div class="center">
                        <h4>Топ читаемых новостей</h4>

                        <?php //include('topFiveNews.php'); ?>


                        <?php foreach ($newsViews as $news_views) :?>
                            <div style="background-color: #FFF; border: 0px solid black; border-radius: 10px">
                                <div style="margin: 10px">
                                    <a href="/new/<?php echo $news_views['id']; ?>" class="news"><?php echo $news_views['title'] ?></a>
                                    <p>
                                        <img class="img" src="../template/img/news/<?php echo $news_views['image']; ?>" alt="Картинка" title="<?php echo $news_views['title']; ?>">
                                    </p>
                                    <text><?php echo substr($news_views['text'], 0, 100) ?><a href="/new/<?php echo $news_views['id']; ?>" >...</a></text><br>
                                    <?php
                                    $col = R::getAll('SELECT COUNT(*) FROM `comments` WHERE `id_new` = ?', array($news_views['id']));
//                                    echo $news_views['image'];
                                    ?>
                                    <i class="fas fa-comment-alt"> <?php echo $col[0]['COUNT(*)']?></i>

                                    <i class="fas fa-eye" style="padding-left: 10px" alt="Динозаврик"> <?php echo $news_views['views']; ?></i>
                                </div>
                            </div>
                        <?php endforeach;?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>





<br>
<br>
<br>
<br>











<?php

include ROOT.'/views/layouts/footer.php';
?>