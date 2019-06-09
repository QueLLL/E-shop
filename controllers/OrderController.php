<?php


class OrderController
{

    public function actionView()
    {
        $id = User::isSignedIn();
        $orders = Order::getUserOrders($id);
        $title = "E-shop | Заказы";
        require_once ROOT . "/views/shop/orders.php";
    }


}