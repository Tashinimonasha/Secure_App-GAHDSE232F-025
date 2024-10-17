<?php
require_once '../config/database.php'; // Ensure this path is correct based on your folder structure

class UserModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect(); // Connects to the database using a Database class
    }

    // Method to create a new user
    public function createUser($name, $email, $password, $salt, $role) {
        $uuid = bin2hex(random_bytes(16)); // Generate a unique UUID
        $stmt = $this->pdo->prepare('INSERT INTO users (uuid, name, email, password, salt, role, access_grant) VALUES (:uuid, :name, :email, :password, :salt, :role, :access_grant)');
        $stmt->execute([
            'uuid' => $uuid, 
            'name' => $name, 
            'email' => $email, 
            'password' => $password, 
            'salt' => $salt, 
            'role' => $role,
            'access_grant' => 0 // Set to false by default
        ]);
        return $uuid;
    }

    // Method to fetch a user by email
    public function getUserByEmail($email) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Method to log user activity
    public function logUserActivity($uuid) {
        $stmt = $this->pdo->prepare('INSERT INTO activity_log (user_id, login_time) VALUES (:user_id, NOW())');
        $stmt->execute(['user_id' => $uuid]);
    }

    // Check if an email already exists in the database
    public function emailExists($email) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }

    // Fetch all users for admin view
    public function getAllUsers() {
        $stmt = $this->pdo->prepare("SELECT id, name, email, role FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to delete a user by ID
    public function deleteUser($userId) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$userId]);
    }

    // Method to update a user's role by ID
    public function updateUserRole($userId, $newRole) {
        $stmt = $this->pdo->prepare("UPDATE users SET role = ? WHERE id = ?");
        return $stmt->execute([$newRole, $userId]);
    }

    public function setAccessGranted($userId, $accessGranted) {
        $stmt = $this->pdo->prepare('UPDATE users SET access_grant = :access_granted WHERE id = :id');
        $stmt->execute([
            'access_granted' => $accessGranted ? 1 : 0, // Convert boolean to integer
            'id' => $userId
        ]);
    }
    
}

// Ensure proper closing of PHP
?>
