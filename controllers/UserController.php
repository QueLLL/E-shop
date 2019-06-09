<?php


class UserController
{
    public function actionSignup()
    {
        $name = '';
        $email = '';
        $password_hash = '';
        $result = false;
        if (!empty($_POST['doSignUp']) && $_POST['doSignUp'] = 1) {
            $name = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $password = ($_POST['password']);

            $errors = [];

            User::checkName($name) ?: $errors[] = "Имя не должно быть короче 2-х символов";
            User::checkEmail($email) ?: $errors[] = "Введен некорректный email";
            User::checkPass($password) ?: $errors[] = "Пароль не должен быть короче 8-ми символов";

            if (empty($errors)) {
                !User::CheckEmailExists($email) ?: $errors[] = "Данный email уже используется";
                if (empty(($errors))) {
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                    $result = User::register($email, $password_hash, $name);
                }
            }
        };
        $title = "E-shop | Регистрация";
        require_once ROOT . "/views/shop/account/signup.php";
    }

    public function actionLogin()
    {
        if(!empty($_POST['doLogin']) && $_POST['doLogin'] = 1) {
            $email = htmlspecialchars(trim($_POST['LoginEmail']));
            $password = ($_POST['LoginPassword']);
            $errors = [];

            User::checkEmail($email)? : $errors[] = "Введен некорректный email";
            User::checkPass($password)? : $errors[] = "Пароль не должен быть короче 8-ми символов";

            if (empty($errors)) {
                $userId = User::isCorrectLogin($email, $password);
                $userId? User::auth($userId): $errors[] = 'Неверные данные для входа';
                if(empty($errors))
                {
                    header("Location: /account");
                }
            }
        };
        $title = "E-shop | Вход";
        require_once ROOT . "/views/shop/account/login.php";
    }

    public function actionSignout()
    {
        session_destroy();
        unset($_SESSION);
        header("Location: /");
    }
}

