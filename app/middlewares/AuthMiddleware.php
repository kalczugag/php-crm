<?php

namespace App\middlewares;

use App\controllers\AuthController;

class AuthMiddleware {
    private $authController;

    public function __construct() {
        $this->authController = new AuthController();
    }

    public function handle() {
        if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $_SESSION['auth_error'] = "Authorization header not found.";
            header('Location: /login');
            exit;
        }

        $token = str_replace('Bearer ', '', $_SERVER['HTTP_AUTHORIZATION']);
        $result = $this->authController->verifyToken($token);

        if (is_string($result)) {
            $_SESSION['auth_error'] = $result;
            header('Location: /login');
            exit;
        }

        $_SESSION['user'] = $result->sub;
    }
}
