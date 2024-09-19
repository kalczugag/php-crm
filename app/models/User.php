<?php

namespace App\models;

use App\models\Database;

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllUsers() {
        $this->db->query("SELECT * FROM `users`");
        return $this->db->resultSet();
    }

    public function getUserByEmail($email) {
        $this->db->query("SELECT * FROM `users` WHERE `email` = :email");
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function register($data) {
        $this->db->query("INSERT INTO users (email, password) VALUES (:email, :password)");
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        return $this->db->execute();
    }
}