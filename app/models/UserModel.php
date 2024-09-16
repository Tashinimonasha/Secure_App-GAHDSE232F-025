<?php
require_once '../config/database.php';  // Move up one directory from `app/models`


class UserModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function createUser($name, $email, $password, $salt, $role) {
        $uuid = bin2hex(random_bytes(16));
        $stmt = $this->pdo->prepare('INSERT INTO users (uuid, name, email, password, salt, role) VALUES (:uuid, :name, :email, :password, :salt, :role)');
        $stmt->execute(['uuid' => $uuid, 'name' => $name, 'email' => $email, 'password' => $password, 'salt' => $salt, 'role' => $role]);
        return $uuid;
    }

    public function getUserByEmail($email) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function logUserActivity($uuid) {
        $stmt = $this->pdo->prepare('INSERT INTO activity_log (user_id, login_time) VALUES (:user_id, NOW())');
        $stmt->execute(['user_id' => $uuid]);
    }
    public function emailExists($email) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }
     // Fetch all users
     public function getAllUsers() {
        $stmt = $this->pdo->prepare("SELECT id, name, email, role FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

