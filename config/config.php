<?php
// Secure session settings
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1);  // Prevent JavaScript access
    ini_set('session.cookie_secure', 1);    // Send cookies over HTTPS
    ini_set('session.use_strict_mode', 1);  // Use strict session mode

    session_start();
}

$host = 'localhost';
$dbname = 'secure_app';
$user = 'root';
$pass = '';

$db = new mysqli($host, $user, $pass, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Define constants for security
define('PEPPER', 'your_pepper_secret'); // Strong pepper value
define('ENCRYPTION_KEY', 'your_encryption_key'); // Encrypt sensitive data
?>
