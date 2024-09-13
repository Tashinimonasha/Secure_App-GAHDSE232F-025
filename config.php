<?php
// Secure session settings, applied before session_start() is called
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1);  // Prevent JavaScript from accessing session cookies
    ini_set('session.cookie_secure', 1);    // Ensure cookies are sent over HTTPS
    ini_set('session.use_strict_mode', 1);  // Prevent uninitialized sessions from being used

    session_start(); // Start the session if it's not already active
}

// Database connection
$host = 'localhost';
$dbname = 'secure_app';
$user = 'root';
$pass = '';

$db = new mysqli($host, $user, $pass, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Define constants
define('PEPPER', 'your_pepper_secret'); // Set a strong pepper value
define('ENCRYPTION_KEY', 'your_encryption_key'); // For encrypting sensitive data
?>
