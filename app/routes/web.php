<?php

use FastRoute\RouteCollector;

return function(RouteCollector $r) {
    $r->addRoute("GET", "/", "HomeController@index");
    $r->addRoute("GET", "/users", "UserController@index");
};