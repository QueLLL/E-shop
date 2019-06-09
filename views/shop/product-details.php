<?php
require_once ROOT. "/views/layouts/header.php";
?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <?php
                        require_once ROOT. "/views/layouts/sidebar.php";
                        ?>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="../../templates/images/home/<?=$productInfo[0]['image']?>" alt="" />
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->
                                        <? if($productInfo[0]['is_new']):?>
                                        <img src="../../templates/images/product-details/new.jpg" class="newarrival" alt="" />
                                        <? endif;?>
                                        <h2><?=$productInfo[0]['name']?></h2>
                                        <p>Код товара: 1089772</p>
                                        <span>
                                            <span>$ <?=$productInfo[0]['price']?></span>
                                            <label>В корзине:</label>
                                            <input id="val-<?=$productInfo[0]['id']?>" type="text" value="<? if(!isset($_SESSION['cart'][$productInfo[0]['id']])) {echo "0";} else { echo $_SESSION['cart'][$productInfo[0]['id']];}?>" />
                                            <button class="cart_quantity_up add-to-cart" data-id="<?=$productInfo[0]['id']?>">
                                                <i class="fa fa-shopping-cart"></i>
                                                +
                                            </button>
                                        </span>
                                        <p><b>Наличие:</b> На складе</p>
                                        <p><b>Состояние:</b> Новое</p>
                                        <p><b>Производитель:</b><?=$productInfo[0]['brand']?></p>
                                    </div><!--/product-information-->
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-sm-12">
                                    <h5>Описание товара</h5>
                                    <p><?=$productInfo[0]['description']?></p>
                                </div>
                            </div>
                        </div><!--/product-details-->

                    </div>
                </div>
            </div>
        </section>
        

        <br/>
        <br/>

<?php
require_once ROOT. "/views/layouts/footer.php";
?>