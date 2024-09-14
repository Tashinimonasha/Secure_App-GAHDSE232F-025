<?php
session_start();

// Initialize error message variable
$error = '';
$success = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required!";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Here you should hash the password and store it securely
        // This is a simplified example
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Store user data into the database (implement this according to your database schema)
        // Assuming successful database insertion
        // $_SESSION['username'] = $username; // Uncomment if you want to log in the user automatically
        $success = "Registration successful! You can now <a href='login.php'>login</a>.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        /* Your existing CSS here */
        /* General body style */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #2c3e50; /* Dark blue background */
    background-image: url('images/image1.jpg');
    color: #ecf0f1; /* Light text color */
    padding-top: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    padding: 0;
    background-image: url()
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
            <button type="submit" class="btn">Register</button>
            <p class="text-danger"><?= htmlspecialchars($error) ?></p>
            <p class="text-success"><?= $success ?></p>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>

<form method="POST" action="login.php">
    <!-- Form fields -->
</form>

<form method="POST" action="register.php">
    <!-- Form fields -->
</form>
