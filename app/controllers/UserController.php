<?php

namespace App\controllers;

use App\models\User;
use App\middlewares\AuthMiddleware;

class UserController extends BaseController {
    private $userModel;
    private $authMiddleware;

    public function __construct() {
        $this->userModel = new User();
        $this->authMiddleware = new AuthMiddleware();
    }

    public function index() {
        $this->authMiddleware->handle();

        $users = $this->userModel->getAllUsers();
        $data = [
            "title" => "Users List",
            "users" => $users
        ];
        $this->loadView("pages/users/index", $data);
    }
}