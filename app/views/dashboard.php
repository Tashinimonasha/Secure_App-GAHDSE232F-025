<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        /* Your existing CSS here */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2c3e50; /* Dark blue background */
            color: #ecf0f1; /* Light text color */
            padding-top: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 350px;
            background-color: #1c2833; /* Darker background for the container */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Strong shadow for depth */
            border: 1px solid #34495e; /* Slight border to enhance definition */
            text-align: center;
        }

        h2 {
            color: #f1c40f; /* Highlighted heading color */
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #f39c12; /* Bold color for security-focused buttons */
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #e67e22; /* Slight hover effect */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?= $username ?>!</h2>
        <p>This is a secure page accessible only after login.</p>
        <a href="logout.php" class="btn">Logout</a>
    </div>
</body>
</html>
