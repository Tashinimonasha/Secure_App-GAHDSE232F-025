<?php

require_once '../config/config.php'; // Database connection

class UserModel {

    public function findByUsername($username) {
        global $db;
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($username, $password) {
        global $db;
        $passwordData = $this->hashPassword($password);
        $stmt = $db->prepare("INSERT INTO users (username, password_hash, salt) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $passwordData['hash'], $passwordData['salt']);
        return $stmt->execute();
    }

    public function hashPassword($password) {
        $salt = bin2hex(random_bytes(16)); // Salt generation
        $hash = hash('sha256', $salt . $password . PEPPER); // Hash with salt and pepper
        return ['hash' => $hash, 'salt' => $salt];
    }

    public function verifyPassword($password, $hash, $salt) {
        return hash('sha256', $salt . $password . PEPPER) === $hash;
    }
}
