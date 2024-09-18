<?php

namespace App\controllers;

class HomeController extends BaseController {
    public function index() {
        $this->loadView("home/index", ["title" => "Home"]);
    }
}