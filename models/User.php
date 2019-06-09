<?php


class User
{
    public static function register($email, $passwordHash, $name)
    {
        $conn = Db::getConnection();
        $sql = 'INSERT INTO `users` (`email`, `pass`, `name`) VALUES (:email, :password, :name)';
        $result = $conn->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $passwordHash, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function checkName($name)
    {
        if(strlen($name)>=2) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkPass($pass)
    {
        if(strlen($pass)>=8) {
            return true;
        }
        return false;
    }

    public static function CheckEmailExists($email)
    {
        $conn = Db::getConnection();
        $sql = 'SELECT COUNT(*) as count FROM `users` WHERE email = :email';
        $result = $conn->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
        if($row['count'] == 0) {
            return false;
        }
        return true;
    }

    public static function isCorrectLogin($email, $pass)
    {
        $conn = Db::getConnection();
        $sql = 'SELECT id, email, pass FROM `users` WHERE email = :email LIMIT 1';
        $result = $conn->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $userData = $result->fetch();
        if(password_verify($pass, $userData['pass'])) {
            return $userData['id'];
        }
        else {
            return false;
        }
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function isSignedIn()
    {
        if(isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /login");
    }

    public static function isGuest()
    {
        if(!empty($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function getUserData($id)
    {
        $conn = Db::getConnection();
        $sql = 'SELECT name FROM `users` WHERE id = :id LIMIT 1';
        $result = $conn->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $userData = $result->fetch();
        return $userData;
    }

    public static function editName($id, $name)
    {
        $conn = Db::getConnection();
        $sql = 'UPDATE `users` SET `name` = :name WHERE `id` = :id';
        $result = $conn->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}