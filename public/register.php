<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>
<body class="register-page">
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
                <input type="password" id="password" name="password" class="form-control" 
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                       title="Password must be at least 8 characters long, include at least one number, one uppercase letter, and one lowercase letter." 
                       required>
                <!-- Password strength meter -->
                <div class="strength-meter" id="strength-meter">
                    <div></div>
                </div>
                <p class="strength-text" id="strength-text"></p>
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

    <script>
        // Password strength meter logic
        const passwordInput = document.getElementById('password');
        const strengthMeter = document.getElementById('strength-meter').firstElementChild;
        const strengthText = document.getElementById('strength-text');

        passwordInput.addEventListener('input', updateStrengthMeter);

        function updateStrengthMeter() {
            const password = passwordInput.value;
            let strength = 0;

            // Evaluate the strength
            if (password.length >= 8) strength += 1;
            if (password.match(/[A-Z]/)) strength += 1;
            if (password.match(/[a-z]/)) strength += 1;
            if (password.match(/\d/)) strength += 1;
            if (password.match(/[\W_]/)) strength += 1; // Special characters

            // Update meter and text based on strength
            strengthMeter.style.width = strength * 20 + '%';
            if (strength === 0) {
                strengthText.textContent = '';
                strengthMeter.style.backgroundColor = 'red';
            } else if (strength <= 2) {
                strengthText.textContent = 'Weak';
                strengthMeter.style.backgroundColor = 'red';
            } else if (strength === 3) {
                strengthText.textContent = 'Medium';
                strengthMeter.style.backgroundColor = 'orange';
            } else if (strength === 4) {
                strengthText.textContent = 'Strong';
                strengthMeter.style.backgroundColor = 'green';
            } else {
                strengthText.textContent = 'Very Strong';
                strengthMeter.style.backgroundColor = 'green';
            }
        }
    </script>
</body>
</html>
<body class="register-page">
    <!-- Register page content -->
</body>
