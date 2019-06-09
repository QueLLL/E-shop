<?php


class Shop
{

    const DEFAULT_LIMIT = 6;

    public static function getCategoriesList()
    {
        $conn = Db::getConnection();
        $result = $conn->query("SELECT category_name, id FROM `categories` WHERE status = 1 ORDER BY sort_order DESC");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $categoriesList = $result->fetchAll();
        return $categoriesList;
    }

    public static function getLastProducts($page)
    {
        $conn = Db::getConnection();
        $offset = ($page-1)*self::DEFAULT_LIMIT;
        $query = "SELECT id, name, image, price,is_new FROM `products` LIMIT " . self::DEFAULT_LIMIT . " OFFSET " . $offset;
        $result = $conn->query($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $products = $result->fetchAll();
        return $products;

    }

    public static function getProductsByCategoryId($CategoryId, $page)
    {
        $conn = Db::getConnection();
        $offset = ($page-1)*self::DEFAULT_LIMIT;
        $query = "SELECT id, name, image, price,is_new FROM `products` WHERE category_id =" . $CategoryId . " LIMIT " . self::DEFAULT_LIMIT . " OFFSET " . $offset;
        $result = $conn->query($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $products = $result->fetchAll();
        return $products;

    }

    public static function getProductInfo($id)
    {
        $conn = Db::getConnection();
        $query = "SELECT * FROM `products` WHERE id =" . $id;
        $result = $conn->query($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $productInfo = $result->fetchAll();
        return $productInfo;
    }

    public static function getProductInfoForCart($idList)
    {
        $idList = implode(', ', $idList);
        $conn = Db::getConnection();
        $query = "SELECT id, name, price, image, brand FROM `products` WHERE id IN ({$idList})";
        $result = $conn->query($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $productInfo = $result->fetchAll();
        return $productInfo;
    }

    public static function getTotalProducts($categoryId = null)
    {
        // Соединение с БД
        $conn = Db::getConnection();
        // Текст запроса к БД
        if(isset($categoryId)) {
            $sql = 'SELECT count(id) AS count FROM `products` WHERE category_id = :category_id';
        }
        else {
            $sql = 'SELECT count(id) AS count FROM `products`';
        }
        // Используется подготовленный запрос
        $result = $conn->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        // Выполнение коменды
        $result->execute();
        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    public static function isIndex()
    {
        if(trim($_SERVER['REQUEST_URI'], '/') == '') {
            return true;
        }
        return false;
    }

}