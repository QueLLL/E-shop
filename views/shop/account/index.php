<?php
require_once ROOT. "/views/layouts/header.php";
?>
<section>
    <h2>Привет, <?= $userData['name'] ?> !</h2>

    <a href="/account/edit">Редактировать профиль</a>
    <br/>
    <a href="/orders/view">Мои заказы</a>
</section>
<?php
require_once ROOT. "/views/layouts/footer.php";
?>
