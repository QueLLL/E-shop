<?php



class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . "/configs/routes.php";
        $this->routes = require_once($routesPath);
    }

    public function getUri()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public function run()
    {
        $uri = $this->getUri();
        if(!empty($uri)) {
            foreach ($this->routes as $route => $path) {
                if (preg_match("~^$route~", "$uri")) {
                    // Getting params from users uri
                    $uri = preg_replace("~^$route~", $path, $uri);
                    $segments = explode('/', $uri);
                    $controllerName = ucfirst(array_shift($segments) . "Controller");
                    require_once(ROOT . "\controllers\\" . $controllerName . ".php");
                    $actionName = "action" . ucfirst(array_shift($segments));
                    if(sizeof($segments)>1){
                        goto error;
                    }
                    break;
                } else {
                    error:
                    require_once (ROOT . '\controllers\ErrorController.php');
                    $controllerName = "ErrorController";
                    $actionName = "actionIndex";
                }
            }
        }
        else {
            require_once (ROOT . '\controllers\MainController.php');
            $controllerName = "MainController";
            $actionName = "actionIndex";
        }

        $controller = new $controllerName();
        if(!empty($segments)) {
            call_user_func_array(array($controller, $actionName), $segments);
        }
        else {
            $controller->$actionName();
        }
    }
}