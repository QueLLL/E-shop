<?php


function autoloader($class_name)
    {
        // Array with classes paths
        $array_paths = array(
            '/models/',
            '/components/',
            '/controllers/',
        );
        foreach ($array_paths as $path) {
            // Building path
            $path = ROOT . $path . $class_name . '.php';
            // Require file if exists
            if (is_file($path)) {
                require_once $path;
            }
        }
    }
spl_autoload_register("autoloader");
