<?php
require_once ROOT. "/components/db.php";

class News
{

    /* Getting news list from DB */
    public static function getNews()
    {
        $conn = Db::getConnection();
        $sql = "SELECT * FROM `news`";
        $result = $conn->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $news = $result->fetchAll();
        return $news;
    }

    /* Getting one news by id from DB */
    public static function getNewsById($id)
    {
        $conn = Db::getConnection();
        $sql = "SELECT * FROM `news` WHERE id = $id";
        $result = $conn->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $newsItem = $result->fetch();
        return $newsItem;
    }
}