<?php


class ShopController
{
    public function actionIndex()
    {
        $products = Shop::getLastProducts(2);
        $categoiesList = Shop::getCategoriesList();
        $title = "E-shop | Главная";
        require_once ROOT. "/views/shop/index.php";
    }

    public function actionCategory($CategoryId, $page = 1)
    {
        $products = Shop::getProductsbyCategoryId($CategoryId, $page);
        $categoiesList = Shop::getCategoriesList();
        $totalCount = Shop::getTotalProducts($CategoryId);
        $pagination = new Pagination($totalCount,$page, Shop::DEFAULT_LIMIT, 'page-' );
        $title = "E-shop | " . $categoiesList["$CategoryId"]['category_name'];
        require_once ROOT. "/views/shop/index.php";
    }


    public function actionCatalog($page = 1)
    {
        $products = Shop::getLastProducts($page);
        $categoiesList = Shop::getCategoriesList();
        $totalCount = Shop::getTotalProducts();
        $pagination = new Pagination($totalCount,$page, Shop::DEFAULT_LIMIT, 'page-' );
        $title = "E-shop | Каталог товаров";
        require_once ROOT. "/views/shop/index.php";
    }

    public function actionContacts()
    {
        $result = false;
        $title = "E-shop | Связаться с нами";
        require_once ROOT. "/views/shop/contact.php";
    }

}