<?php


class ProductController
{
    public function actionView($id)
    {
        $productInfo = Shop::getProductInfo($id);
        $categoiesList = Shop::getCategoriesList();
        $title = "E-shop | " . $productInfo[0]['name'];
        require_once ROOT. "/views/shop/product-details.php";
    }

    public function actionList()
    {
        echo "Products, List";
    }

    public function actionCategories()
    {
        echo "Products, Categories";
    }

}