<?php

include_once ROOT. '/models/News.php';

class NewController {

    public function actionList()
    {

        $newsList = array();
        $newsList = News::getNewsList();

        $newsViews = array();
        $newsViews = News::getNewsListLastFive();


            require_once(ROOT.'/views/news/news.php');

        return true;
    }

    public function actionView($id)
    {
		if ($id) {
            $newsItem = array();
			$newsItem = News::getNewsItemByID($id);

            $newsViews = array();
            $newsViews = News::getNewsListLastFive();

            $result = News::updateViews($id);

            $comment = array();
            $comment = News::getComment($id);

            $col = News::getColComments($id);

            $address_remove = News::addressRemove($id);

            $cabinetName = array();
            $cabinetName = News::getName();

            require_once(ROOT.'/views/news/new.php');
//            require_once(ROOT.'/views/news/news.php');
		}

        return true;

    }

}

