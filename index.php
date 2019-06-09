<?php

define('ROOT', __DIR__);

session_start();
/* Loading classes */
require_once ROOT. "/components/Autoload.php";

/* Require configs */
require_once(ROOT . '/configs/main.php');


$router = new Router();
$router->run();
