<?php
class SecureHash {
    private $pepper = "yourPepperString";  // A secret string stored securely

    // Function to hash a password using SHA-256, salt, and pepper
    public function hashPassword($password, $salt) {
        return hash('sha256', $salt . $password . $this->pepper);
    }

    // Function to verify a hashed password
    public function verifyPassword($inputPassword, $hashedPassword, $salt) {
        return hash('sha256', $salt . $inputPassword . $this->pepper) === $hashedPassword;
    }
}
