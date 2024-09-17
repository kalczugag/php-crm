<?php

class Router {
    private $routes = [];

    public function define($routes) {
        $this->routes = $routes;
    }

    public function dispatch($uri) {
        $uri = parse_url($uri, PHP_URL_PATH);

        if (array_key_exists($uri, $this->routes)) {
            require $this->routes[$uri];
        } else {
            $this->abort(404);
        }
    }

    public function abort($code = 404) {
        http_response_code($code);
        require "../app/views/errorCodes/{$code}.php";
        die();
    }
}