<?php


require_once ROOT . '/models/News.php';

class NewsController
{
    public function actionIndex()
    {
        echo "Список новостей:";
        $news = News::getNews();
        print_r($news);
    }

    public function actionView($id)
    {
        $newsItem = News::getNewsById($id);
        print_r($newsItem);
    }

}