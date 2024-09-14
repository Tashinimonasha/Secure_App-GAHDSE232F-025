<?php

require_once '../app/controllers/AuthController.php';

$request = $_SERVER['REQUEST_URI'];

if ($request === '/login') {
    $controller = new AuthController();
    $controller->login();
} elseif ($request === '/register') {
    $controller = new AuthController();
    $controller->register();
} else {
    echo "404 Not Found";
}
?>
