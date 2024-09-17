<?php

require "../app/Router.php";

$router = new Router();

$router->define([
    "/" => "../app/views/home/index.php",
]);

$router->dispatch($_SERVER['REQUEST_URI']);