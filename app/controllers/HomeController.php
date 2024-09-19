<?php

namespace App\controllers;

use App\middlewares\AuthMiddleware;

class HomeController extends BaseController {
    private $authMiddleware;

    public function __construct() {
        $this->authMiddleware = new AuthMiddleware();
    }

    public function index() {
        $this->authMiddleware->handle();

        $this->loadView("home/index", ["title" => "Home"]);
    }
}