<?php


class Db
{
    public static function getConnection()
    {
        require ROOT . "/configs/db.php";
        return new PDO($dsn, $user, $password);
    }
}