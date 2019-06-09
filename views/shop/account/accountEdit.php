<?php
require_once ROOT. "/views/layouts/header.php";
?>
<section>
    <h2>Редактирвоание профиля</h2>
    <? if(!empty($errors)):?>
    <ul>
        <? foreach ($errors as $error):?>
            <li><?=$error?></li>
        <?php endforeach;?>
        <ul/>
        <? endif;?>
        <? if($result == false):?>
            <form action="#" method="post">
            <input type="text"  name="name" value="<?= $userData['name'] ?>" placeholder="Name" required/>
            <button type="submit" name="changeName" value="1" class="btn btn-default">Изменить</button>
        </form>
        <? else:?>
        <br/>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Имя изменено!</h4>
                </div>
        <? endif;?>


    <a href="/account">Назад</a>
</section>
<?php
require_once ROOT. "/views/layouts/footer.php";
?>
