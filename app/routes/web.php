<?php

use FastRoute\RouteCollector;

return function(RouteCollector $r) {
    $r->addRoute("GET", "/", "HomeController@index");

    $r->addRoute("GET", "/login", "AuthController@loginPage");
    $r->addRoute("GET", "/register", "AuthController@registerPage");

    $r->addRoute("GET", "/users", "UserController@index");
};