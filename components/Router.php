<?php

/**
 * Класс Router
 * Компонент для работы с маршрутами
 */
class Router
{
    private $routes;

    public function __construct()
    {
        // Getting list of existing routes
        $routesPath = ROOT . "/configs/routes.php";
        $this->routes = require_once($routesPath);
    }

    public function getUri()
    {
        // Getting users URI
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public function run()
    {
        $uri = $this->getUri();
            foreach ($this->routes as $route => $path) {

                /* Checking if we have a route like a user's uri */
                if (preg_match("~^$route$~", "$uri")) {

                    // Getting controller name, action name and params from users uri
                    $uri = preg_replace("~^$route~", $path, $uri);
                    $segments = explode('/', $uri);

                    // Getting name of Controller from users URI
                    $controllerName = ucfirst(array_shift($segments) . "Controller");

                    // Require controller file
                    require_once(ROOT . "/controllers/" . $controllerName . ".php");
                    $actionName = "action" . ucfirst(array_shift($segments));

                    // Giving 404 error because we dont have pages with 3 and more params
                    if(sizeof($segments)>2){
                        goto notFound;
                    }
                    break;

                    // Giving 404 error if we dont have a route
                } else {
                    notFound:
                    require_once (ROOT . '/controllers/ErrorController.php');
                    $controllerName = "ErrorController";
                    $actionName = "actionIndex";
                }
            }
        $controller = new $controllerName();

            // Calling action of controller and giving params if we have
        if(!empty($segments)) {
            call_user_func_array(array($controller, $actionName), $segments);
        }

        // Dont giving params if we dont have
        else {
            $controller->$actionName();
        }
    }
}