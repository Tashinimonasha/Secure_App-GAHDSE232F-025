<?php
session_start();

// Initialize error message variable
$error = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    // Validate inputs
    if (empty($username) || empty($password)) {
        $error = "Username and password are required!";
    } else {
        // Perform login logic (e.g., check against database)
        // Here you should hash and verify password using a method such as password_hash() and password_verify()
        // This is a simplified check for demonstration purposes only
        if ($username == 'admin' && $password == 'password') {
            // On success, set session variable and redirect
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            // On failure, show an error message
            $error = "Invalid username or password!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        /* Your existing CSS here */
        /* General body style */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #2c3e50; /* Dark blue background */
    background-image: url('image1.jpg');
    color: #ecf0f1; /* Light text color */
    padding-top: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    padding: 0;
}

/* Container styling */
.container {
    width: 350px;
    background-color: #1c2833; /* Darker background for the container */
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Strong shadow for depth */
    border: 1px solid #34495e; /* Slight border to enhance definition */
}

/* Header style for security emphasis */
h2 {
    text-align: center;
    margin-bottom: 50px;
    color: #f1c40f; /* Highlighted heading color */
    font-weight: 600;
    letter-spacing: 1px;
}

/* Form group styling */
.form-group {
    margin-bottom: 20px;
}

/* Input field styles for enhanced security */
.form-control {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 5px;
    background-color: #34495e; /* Darker input fields for security focus */
    color: #ecf0f1; /* Light text inside input */
    font-size: 14px;
}

/* Focus effect for input fields */
.form-control:focus {
    outline: none;
    background-color: #2c3e50; /* Change background to indicate focus */
    box-shadow: 0 0 8px rgba(241, 196, 15, 0.5); /* Highlighted focus effect */
}

/* Button styles */
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

/* Hover effect for buttons */
.btn:hover {
    background-color: #e67e22; /* Slight hover effect */
}

/* Error message styling */
.text-danger {
    color: #e74c3c; /* Red color for error messages */
    font-size: 14px;
    text-align: center;
}

/* Link styles */
a {
    color: #ecf0f1; /* Light color for links */
    text-decoration: none;
}

/* Hover effect for links */
a:hover {
    color: #f39c12; /* Orange hover effect */
}

/* Centering text in the container */
p {
    text-align: center;
}

/* Bold links in the container */
.container p a {
    font-weight: bold;
    letter-spacing: 1px;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <p class="text-danger"><?= htmlspecialchars($error) ?></p>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>

<form method="POST" action="login.php">
    <!-- Form fields -->
</form>

<form method="POST" action="register.php">
    <!-- Form fields -->
</form>

 
