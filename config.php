<?php
// Database connection
$host = 'localhost';
$dbname = 'your_db';
$user = 'your_db_user';
$pass = 'your_db_password';

$db = new mysqli($host, $user, $pass, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Define constants
define('PEPPER', 'your_pepper_secret'); // Set a strong pepper value
define('ENCRYPTION_KEY', 'your_encryption_key'); // For encrypting sensitive data

// Secure session settings
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.use_strict_mode', 1);
session_start();
?>
