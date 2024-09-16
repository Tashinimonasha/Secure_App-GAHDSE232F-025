<?php
require_once '../app/controllers/AuthController.php';
require_once '../app/models/UserModel.php';
require_once '../core/SessionManager.php';
require_once '../core/SecureHash.php';

// Create instances of the dependencies
$secureHash = new SecureHash();
$userModel = new UserModel();


// Pass the dependencies to the AuthController
$authController = new AuthController($secureHash, $userModel);

if (isset($_POST['register'])) {
    // Ensure all form fields are set
    if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
        $authController->register($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirm_password']);
    } else {
        echo "Please fill in all required fields.";
    }
}
if (isset($_POST['login'])) {
    $authController->login($_POST['email'], $_POST['password']);
}
