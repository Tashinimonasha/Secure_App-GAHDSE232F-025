<?php
require 'config.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        $passwordData = hashPassword($password);
        $stmt = $db->prepare("INSERT INTO users (username, password_hash, salt) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $passwordData['hash'], $passwordData['salt']);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit;
        } else {
            $error = "Error: " . $stmt->error;
        }
    }
}

function hashPassword($password) {
    $salt = bin2hex(random_bytes(16)); // Generate a random salt
    $hash = hash('sha256', $salt . $password . PEPPER); // Combine salt, password, and pepper
    return ['hash' => $hash, 'salt' => $salt];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css"> <!-- Bootstrap or custom CSS -->
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <p class="text-danger"><?= isset($error) ? $error : '' ?></p>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
