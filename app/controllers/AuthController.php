<?php

namespace App\controllers;

use App\models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class AuthController extends BaseController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function loginPage() {
        $this->loadView("auth/login", ["title" => "Login"]);
    }

    public function registerPage() {
        $this->loadView("auth/register", ["title" => "Register"]);
    }

    public function generateToken($userId) {
        $secretKey = $_ENV["JWT_SECRET"];
        $algo = $_ENV["JWT_ALGO"];
        $exp = $_ENV["JWT_EXP"];

        $payload = [
            "iss" => "http://localhost",
            "sub" => $userId,
            "iat" => time(),
            "exp" => time() + $exp
        ];

        $jwt = JWT::encode($payload, $secretKey, $algo);

        return $jwt;
    }

    public function verifyToken($token) {
        $secretKey = $_ENV["JWT_SECRET"];
        $algo = $_ENV["JWT_ALGO"];

        try {
            $decoded = JWT::decode($token, new Key($secretKey, $algo));

            return $decoded;
        } catch (Exception $e) {
            return "Token is invalid: " . $e->getMessage();
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);

            $user = $this->userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user->password)) {
                $token = $this->generateToken($user->id);
                return json_encode(["token" => $token]);
            } else {
                return "Invalid credentials";
            }
        }
    }
}