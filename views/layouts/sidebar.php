<div class="left-sidebar">
    <a href="/catalog"><h2>Каталог</h2></a>
    <div class="panel-group category-products">

        <?php foreach ($categoiesList as $category):?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="/category/<?=$category['id']?>" class="<?if(isset($CategoryId) && $CategoryId == $category['id']) echo 'active'; ?>"><?=$category['category_name']?></a></h4>
                </div>
            </div>
        <?php endforeach;?>
    </div>

</div>