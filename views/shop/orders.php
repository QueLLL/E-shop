<?php require_once ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <?php   $orders =  array_reverse($orders) ?>
    <?php foreach ($orders as $order):?>
        <?php
        $items = Order::decodeOrder($order['ordered_items']);
        ?>
        ID заказа:<?=$order['id']?> <div/>
            <div>Время заказа: <?=$order['time']?> <div/>
                <div> Статус: <?=Order::decodeStatus($order['status'])?>  <div/>
                    <div> Заказ: <?php foreach ($items as $item):?>
                        <?=$item['name']?>,<?=$item['brand']?>, <?=$item['count']?> шт.
                        <br/>
                        <?php endforeach;?><div/>
                        <div> Стоимость, $: <?=$order['total']?><div/>
            <hr/>
            <?php endforeach;?>
        <div/>
        <section/>
        <?php require_once ROOT . '/views/layouts/footer.php'; ?>
