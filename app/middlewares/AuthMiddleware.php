<?php

namespace App\middlewares;

use App\controllers\AuthController;
use Exception;

class AuthMiddleware {
    private $authController;

    public function __construct() {
        $this->authController = new AuthController();
    }

    public function handle() {
        if (!isset($_COOKIE['auth_token'])) {
            header('Location: /login');
            exit;
        }

        try {
            $decoded = $this->authController->verifyToken($_COOKIE['auth_token']);
            return $decoded;
        } catch (Exception $e) {
            // Invalid token
            setcookie('auth_token', '', time() - 3600, "/"); // Clear the invalid token
            header('Location: /login');
            exit;
        }
    }
}
