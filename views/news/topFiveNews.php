<?php foreach ($newsViews as $news_views) :?>
    <div style="background-color: #FFF; border: 0px solid black; border-radius: 10px">
        <div style="margin: 10px">
            <a href="/new/<?php echo $news_views['id']; ?>" class="news"><?php echo $news_views['title'] ?></a>
            <p>
                <img class="img" src="../template/img/news/<?php echo $news_views['image']; ?>" alt="Картинка" title="<?php echo $news_views['title']; ?>">
            </p>
            <text><?php echo substr($news_views['text'], 0, 100) ?><a href="/new/<?php echo $news_views['id']; ?>" >...</a></text><br>
            <?php
            $col = R::getAll('SELECT COUNT(*) FROM `comments` WHERE `id_new` = ?', array($news->id));
            ?>
            <i class="fas fa-comment-alt"> <?php echo $col[0]['COUNT(*)']?> </i>

            <i class="fas fa-eye" style="padding-left: 10px" alt="Динозаврик"> <?php echo $news->views; ?></i>
        </div>
    </div>
<?php endforeach; ?>