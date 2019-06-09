<?php


class CartController
{
    public function actionAdd($id)
    {
        Cart::addToCart($id);
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

    public function actionAddAjax($id)
    {
        Cart::addToCart($id);
        $_SESSION['cartAjax'] = $_SESSION['cart'];
        $_SESSION['cartAjax']['count'] = Cart::CartCount();
        echo json_encode($_SESSION['cartAjax']);
    }

    public function actionDeleteall()
    {
        Cart::deleteAllFromCart();
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }


    public function actionDelete($id)
    {
        Cart::deleteItemFromCart($id);
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

    public function actionDeleteone($id)
    {
        Cart::deleteOneItemFromCart($id);
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }


    public static function actionIndex()
    {
        if(isset($_SESSION['cart'])){
            $idList = array_keys($_SESSION['cart']);
            $productInfoList = array();
            $total = 0;
            $productInfoList = Shop::getProductInfoForCart($idList);
            foreach ($productInfoList as $product) {
                $total += $product['price']*$_SESSION['cart'][$product['id']];
            }

        }
        if(isset($_SESSION['user'])) {
            $userName = User::getUserData($_SESSION['user']);
        }
        if(isset($_POST['order'])) {
            $userId = User::isSignedIn();
            $userAddress = htmlspecialchars($_POST['address']);
            $userPhone = htmlspecialchars($_POST['phone']);
            $total = htmlspecialchars($_POST['total']);
            $orderedItems = json_encode($_SESSION['cart']);
            $errors = [];
            $result = Order::newOrder($userId, $userPhone, $userAddress, $orderedItems, $total);
        }
        if(isset($result) && $result) {
            unset($_SESSION['cart']);
            $title = "E-shop | Заказ оформлен";
            require_once ROOT . "/views/shop/order-succes.php";
        }
        elseif(isset($result) && !$result) {
            $errors[] = "Не удалось оформить заказ";
        }
        else {
            $title = "E-shop | Корзина";
            require_once ROOT. "/views/shop/cart.php";
        }
    }
}