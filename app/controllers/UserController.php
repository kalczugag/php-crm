<?php

namespace App\controllers;

use App\models\User;

class UserController extends BaseController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        $data = [
            "title" => "Users List",
            "users" => $users
        ];
        $this->loadView("users/index", $data);
    }
}