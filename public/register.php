<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="index.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" 
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                       title="Password must be at least 8 characters long, include at least one number, one uppercase letter, and one lowercase letter." 
                       required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" class="form-control" required>
            </div>
            <button type="submit" class="btn" name="register">Register</button>
             <!-- Display error message in red under the button -->
             <?php if (isset($error)) : ?>
                <p class="error-message"><?= $error ?></p>
            <?php endif; ?>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
<body class="register-page">
    <!-- Register page content -->
</body>
