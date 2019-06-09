<?php
require_once ROOT. "/views/layouts/header.php";
?>

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <? if(!empty($errors)):?>
                        <ul>
                            <? foreach ($errors as $error):?>
                            <div class="alert alert-danger" role="alert"><?=$error?></div>
                            <?php endforeach;?>
                            <ul/>
                            <? endif;?>
                            <? if($result == true):?>
                                <h3>Вы зарегистрированы</h3>
                            <a href="/login">Вход</a>
                            <? else:?>
                                <h2>New User Signup!</h2>
                                <form action="#" method="post">
                                    <input type="text"  name="name" value="<?= $name ?>" placeholder="Name" required/>
                                    <input type="email" name="email" value="<?= $email ?>" placeholder="Email Address" required/>
                                    <input type="password" name="password" placeholder="Password" required/>
                                    <button type="submit" name="doSignUp" value="1" class="btn btn-default">Signup</button>
                                </form>
                            <? endif;?>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->


<?php
require_once ROOT. "/views/layouts/footer.php";
?>