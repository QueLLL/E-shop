<?php
require_once ROOT. "/views/layouts/header.php";
?>

	<section id="cart_items">
		<div class="container">
            <?php if(!empty($productInfoList)):?>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

                            <?php foreach ($productInfoList as $product):?>
                        <tr>
							<td class="cart_product">
								<a href=""><img src="../../templates/images/home/<?=$product['image']?>" alt="" width="70" height="70"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?=$product['name']?></a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$ <?=$product['price']?> </p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_down" href="/cart/delete-one/<?=$product['id']?>"> - </a>
									<input id="val-<?=$product['id']?>" class="cart_quantity_input" type="text" name="quantity" value="<?= $_SESSION['cart'][$product['id']]?>" autocomplete="off" size="2">
									<a class="cart_quantity_up"  href="/cart/add/<?=$product['id']?>"> + </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$<?=$product['price']*$_SESSION['cart'][$product['id']]?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="/cart/delete/<?=$product['id']?>"><i class="fa fa-times"></i></a>
							</td>
                        </tr>
<?php endforeach;?>
                            <tr>
                                <td class="cart_product">

                                </td>
                                <td class="cart_description">

                                </td>
                                <td class="cart_delete" id="updater"  >

                                </td>
                                <td class="cart_quantity">

                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">$<?= $total?></p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="/cart/delete-all">Очистить</a>
                                </td>
                            </tr>
<?php else:?>
<h4>Корзина пуста</h4>
<?php endif;?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
<?php if(!empty($productInfoList)):?>
	<section id="do_action">
		<div class="container">
        <?php if(User::isGuest()):?>
            <?= 'Авторизуйтесь, чтобы продолжить покупки' ?>
        <?php else:?>
			<div class="heading">
				<h3>Оформление заказа</h3>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<div class="chose_area">
						<ul class="user_option">

						</ul>
						<ul class="user_info">
							<li class="single_field">

							</li>
							<li class="single_field">

							</li>
                            <div class="total_area">
                                <ul>
                                    <li>Стоимость товаров<span>$<?= $total?></span></li>
                                    <li>Стоимость доставки <span>Бесплатно</span></li>
                                    <li>Итог <span>$<?= $total?></span></li>
                                </ul>
                            </div>
                            <?php if(!empty($errors)):?>
                            <ul>
                                <?php foreach ($errors as $error):?>
                                <div class="alert alert-danger" role="alert"><?=$error?></div>
                                <?php endforeach;?>
                                <ul/>
                                <?php endif;?>
                            <form method="post">
                            <label>Ваше имя:</label><input type="text" value="<?=$userName['name']?>" required >
                            <label>Номер телефона:</label><input name="phone" type="text" required >
                            <label>Адрес доставки:</label><input name="address" type="text" required >
                                <input name="total"  value="<?=$total?>" type="text" required style="display: none">
                                <button type="submit" class="btn btn-default check_out" name="order">Оформить заказ</button>
                            </form>
						</ul>
					</div>
				</div>

			</div>
        <?php endif;?>
		</div>
	</section><!--/#do_action-->
    <?php endif;?>
<?php
require_once ROOT. "/views/layouts/footer.php";
?>