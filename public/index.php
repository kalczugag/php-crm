<?php

require '../vendor/autoload.php';
require "../config/credentials.php";

$dispatcher = FastRoute\simpleDispatcher(require '../app/Routes/web.php');

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo '404 - Not Found';
        break;

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        http_response_code(405);
        echo '405 - Method Not Allowed';
        break;

    case FastRoute\Dispatcher::FOUND:
        list($controller, $method) = explode('@', $routeInfo[1]);
        $vars = $routeInfo[2];

        $controller = "App\\Controllers\\{$controller}";

        if (class_exists($controller) && method_exists($controller, $method)) {
            $instance = new $controller();
            call_user_func_array([$instance, $method], $vars);
        } else {
            echo "Controller or method not found.";
        }
        break;
}
