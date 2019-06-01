<?php


class Db
{
    public static function getConnection()
    {
        require_once ROOT . "/configs/db.php";
        return new PDO($dsn, $user, $password);
    }
}