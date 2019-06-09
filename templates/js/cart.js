$(document).ready(function() {
        $('.add-to-cart').on('click',function() {
            var id = $(this).attr('data-id');
            $.post("/cart/addAjax/"+id, {}, function (data) {
                cart = $.parseJSON(data);
                $('#count').html(cart['count']);
                $("#val-"+id).val(cart[id]);
                alert("Товар добавлен в корзину");
            });
        });
});
