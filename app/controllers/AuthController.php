<?php

require_once '../app/models/UserModel.php';

class AuthController {
    public function login() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            
            $userModel = new UserModel();
            $user = $userModel->findByUsername($username);
            
            if ($user && $userModel->verifyPassword($password, $user['password_hash'], $user['salt'])) {
                $_SESSION['user_token'] = bin2hex(random_bytes(32)); // Session token
                $_SESSION['user_role'] = $user['role'];
                header('Location: /dashboard');
                exit;
            } else {
                $error = "Invalid username or password";
                require '../app/views/login.php';
            }
        } else {
            require '../app/views/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $confirmPassword = htmlspecialchars($_POST['confirm_password']);

            if ($password !== $confirmPassword) {
                $error = "Passwords do not match.";
                require '../app/views/register.php';
            } else {
                $userModel = new UserModel();
                if ($userModel->create($username, $password)) {
                    header("Location: /login");
                    exit;
                } else {
                    $error = "Error registering user.";
                    require '../app/views/register.php';
                }
            }
        } else {
            require '../app/views/register.php';
        }
    }
}
