<?php


class Cart
{
    public static function addToCart($id)
    {
        $cart = array();

        if(isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }

        if(array_key_exists($id, $cart)) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        $_SESSION['cart'] = $cart;

    }

    public static function CartCount()
    {

        $itemsInCart = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $itemsInCart += $value;
            }
        }
        return $itemsInCart;
    }

    public static function deleteItemFromCart($id)
    {
        unset($_SESSION['cart'][$id]);
    }

    public static function deleteAllFromCart()
    {
        unset($_SESSION['cart']);
    }

    public static function deleteOneItemFromCart($id)
    {
        if($_SESSION['cart'][$id] == 1) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id]--;
        }
    }

    public static function getTotal($cart)
    {

    }
}