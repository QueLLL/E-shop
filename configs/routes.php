<?php
return array(
    /* Shop */
    '' => 'shop/index',
    'category/([0-9]+)' => 'shop/category/$1',
    'category/([0-9]+)/page-([0-9]+)' => 'shop/category/$1/$2',
    'catalog' => 'shop/catalog',
    'catalog/page-([0-9]+)' => 'shop/catalog/$1',
    'contacts' => 'shop/contacts',

    /* Product */
    'product/([0-9]+)' => 'product/view/$1',

    /* User */
    'login' => 'user/login',
    'signup' => 'user/signup',
    'signout' => 'user/signout',
    'account' => 'account/index',
    'account/edit' => 'account/edit',

    /* Cart*/
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/delete-all' => 'cart/deleteall',
    'cart/delete-one/([0-9]+)' => 'cart/deleteone/$1',
    'cart' => 'cart/index',

    /* Orders */
    'orders/view' => 'order/view',
    'order/new' => 'order/order',

    'blog' => 'error/blog',
    'about' => 'error/about',
);