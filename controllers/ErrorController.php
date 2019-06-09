<?php




class ErrorController
{
    public function actionIndex()
    {
        $title = "E-shop | 404";
        require_once ROOT . "/views/shop/404.php";
    }

    public function actionBlog()
    {
        $title = "E-shop | Блог";
        require_once ROOT . "/views/shop/blog.php";
    }

    public function actionAbout()
    {
        $title = "E-shop | О магазине";
        require_once ROOT . "/views/shop/about.php";
    }

}