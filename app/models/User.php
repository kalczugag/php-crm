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

    public function createUser($email, $password) {
        $this->db->query("INSERT INTO users (email, password) VALUES (:email, :password)");
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);

        return $this->db->execute();
    }
}