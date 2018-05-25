<?php


class News
{

	/** Returns single news items with specified id
	* @rapam integer &id
	*/

	public static function getNewsItemByID($id)
	{
		$id = intval($id);

		if ($id) {
//            $idNew = explode('/',$_SERVER['REQUEST_URI']);
            $newsItem = R::getRow('SELECT * FROM news WHERE id = ?', array($id));
			return $newsItem;
		}

	}

	public static function updateViews($id)
    {
        $result = R::exec('UPDATE `news` SET views = views + 1 WHERE `id` = '.$id);
        return $result;
    }

	public static function getNewsListLastFive()
    {
	    $newsViews = R::getAll('SELECT * FROM news ORDER BY `views` DESC limit 5');
	    return $newsViews;
    }

    public static function getComment($id)
    {
        $comment = R::find('comments', 'id_new = ?', array($id));
        return $comment;
    }

    public static function getColComments($id)
    {
        $col = R::getAll('SELECT COUNT(*) FROM `comments` WHERE `id_new` = ?', array($id));
        return $col;
    }

    public static function getName()
    {
        if(isset($_SESSION['logged_user']->login)){
            $login = $_SESSION['logged_user']['login'];
            $finde = R::findOne('users', 'login = ?', array("$login"));
            $finde2 = R::load('users', $finde->id);
            return $finde2;
        }
    }

    public static function addressRemove($id)
    {
//        return header("Location: http://itschoolsamsungprogect/new/$id");
    }


	/**
	* Returns an array of news items
	*/
	public static function getNewsList()
    {

	    $newsList = R::find('news', 'id >= ? ORDER BY id DESC', array(1));

		return $newsList;
	
}

}