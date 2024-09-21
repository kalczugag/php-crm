<?php

namespace App\controllers;

use App\middlewares\AuthMiddleware;

class TasksController extends BaseController {
    private $authMiddleware;

    public function __construct() {
        $this->authMiddleware = new AuthMiddleware();
    }

    public function index() {
        $this->authMiddleware->handle();

        $this->loadView("pages/tasks/index", ["title" => "List of tasks"]);
    }
}