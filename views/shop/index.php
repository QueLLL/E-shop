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
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center"><?php if(Shop::isIndex()) {
                                echo 'Последние товары';} else {echo 'Каталог';}?></h2>
                            <?php foreach ($products as $product):?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="/product/<?=$product['id']?>">
                                                <img src="../../templates/images/home/<?=$product['image']?>" alt="" />
                                            </a>
                                            <h2><?=$product['price']?> $</h2>
                                            <p><?=$product['name']?></p>
<!--                                            /cart/add/--><?//=$product['id']?>
                                            <button href="" class="btn btn-default add-to-cart" data-id="<?=$product['id']?>"><i class="fa fa-shopping-cart"></i>В корзину</button>
                                        </div>
                                        <?php if($product['is_new']):?>
                                        <img src="../../templates/images/home/new.png" class="new" alt="" />
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <br/>

                        </div><!--features_items-->
                        <?php
                        if(Shop::isIndex()) {
                        //    require_once ROOT. "/views/layouts/recomemded.php";
                        }
                        else {
                                echo '<div class="col-sm-10">';
                                echo $pagination->get();
                                echo '</div>';
                            }
                            ?>
                    </div>
                </div>
            </div>
        </section>

<?
require_once ROOT. "/views/layouts/footer.php";
?>