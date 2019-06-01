<?php



define('ROOT', __DIR__);

/* Connection to DB */
// require_once(__DIR__ . '/configs/db.php');

/* Require configs */
require_once(ROOT . '/configs/main.php');

/* Require router */
require_once(ROOT . '/components/Router.php');



$router = new Router();
$router->run();

