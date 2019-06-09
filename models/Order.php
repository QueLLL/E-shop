<?php


class Order
{
    public static function newOrder($userId, $userPhone, $userAddress, $orderedItems, $total)
    {
        $conn = Db::getConnection();
        $sql = 'INSERT INTO `orders` (`user_id`, `ordered_items`, `user_phonenumber`, `user_addres`, `total`) VALUES ( :id,  :items, :phone, :address, :total);';
        $result = $conn->prepare($sql);
        $result->bindParam(':id', $userId, PDO::PARAM_INT);
        $result->bindParam(':phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':address', $userAddress, PDO::PARAM_STR);
        $result->bindParam(':items', $orderedItems, PDO::PARAM_STR);
        $result->bindParam(':total', $total, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getUserOrders($id)
    {
        $conn = Db::getConnection();
        $query = "SELECT * FROM `orders` WHERE user_id = " . $id . " LIMIT 10";
        $result = $conn->query($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $orders = $result->fetchAll();
        return $orders;
    }

    public static function decodeOrder($data)
    {
        $orderedItems = json_decode($data, TRUE);
            $idList = array_keys($orderedItems);
        $count = array_values($orderedItems);
        $productList = Shop::getProductInfoForCart($idList);
        $i=0;
        $result = [];
        foreach ($productList as $product)
        {
            $product['count'] = $count[$i];
            $result[] = $product;
            $i++;
        }
        return $result;
    }

    public static function decodeCount($data)
    {
        $decoded = json_decode($data, TRUE);
        return array_values($decoded);
    }

    public static function decodeStatus($status)
    {
        if($status == 1) {
            return  "В обработке";
        }
        elseif ($status == 2)
        {
            return "Выполняется";
        }
        elseif ($status == 3)
        {
            return "Выполнен";
        }
    }

}