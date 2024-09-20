<?php

namespace App\controllers;

use App\models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class AuthController extends BaseController {
    private $cookieName;
    private $userModel;

    public function __construct() {
        $this->cookieName = $_ENV["AUTH_COOKIE_NAME"];
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
            "iss" => "localhost",
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
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $this->userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user->password)) {
            $jwt = $this->generateToken($user->id);

            setcookie($this->cookieName, $jwt, time() + 3600, "/", "", false, true);
            header("Location: /");
        } else {
            return "Invalid login credentials";
        }
    }
    
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = trim($_POST["email"]);
            $password = password_hash(trim($_POST["password"]), PASSWORD_BCRYPT);

            if ($this->userModel->createUser($email, $password)) {
                header('Location: /login');
                exit;
            } else {
                return $this->loadView("auth/register", ["title" => "Register", "error" => "Registration failed"]);
            }
        }
    }

    public function logout() {
        setcookie($this->cookieName, "", time() - 3600, "/");
        header("Location: /login");
    }
}