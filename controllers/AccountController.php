<?php


class AccountController
{
    public function actionIndex()
    {
        $id = User::isSignedIn();
        $userData = User::getUserData($id);
        $title = "E-shop | Аккаунт";
        require_once ROOT . "/views/shop/account/index.php";
    }

    public function actionEdit()
    {
        $result = false;
        $id = User::isSignedIn();
        $userData = User::getUserData($id);
        if (!empty($_POST['changeName'])) {
            $name = htmlspecialchars(trim($_POST['name']));
            User::checkName($name) ?: $errors[] = "Имя не должно быть короче 2-х символов";

            if (empty($errors)) {
                User::editName($id, $name)? $result = true : $errors[] = "Не удалось изменить имя";
            }
        }
        $title = "E-shop | Изменнение аккаунта";
        require_once ROOT . "/views/shop/account/accountEdit.php";
    }
}