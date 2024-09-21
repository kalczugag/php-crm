<?php

use FastRoute\RouteCollector;

return function(RouteCollector $r) {
    $r->addRoute("GET", "/", "TasksController@index");

    $r->addRoute("GET", "/users", "UserController@index");

    $r->addRoute("GET", "/login", "AuthController@loginPage");
    $r->addRoute("POST", "/login", "AuthController@login");
    $r->addRoute("GET", "/register", "AuthController@registerPage");
    $r->addRoute("POST", "/register", "AuthController@register");
    $r->addRoute("GET", "/logout", "AuthController@logout");
};