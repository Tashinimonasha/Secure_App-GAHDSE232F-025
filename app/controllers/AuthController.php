<?php
use PHPMailer\PHPMailer\PHPMailer;

class AuthController{
    private $secureHash;
    private $userModel;

    public function __construct($secureHash, $userModel) {
        $this->secureHash = $secureHash;
        $this->userModel = $userModel;
    }

    public function register($name, $email, $password, $confirmPassword) {
        // Check if password and confirm password match
         // Validate email format
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
            return;
        }

          // Check if email already exists
          if ($this->userModel->emailExists($email)) {
            echo "Email already exists.";
            return;
        }
        // Validate password complexity
        if (!preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/', $password)) {
            echo "Password must be at least 8 characters long, include at least one number, one uppercase letter, and one lowercase letter.";
            return;
        }

        if ($password !== $confirmPassword) {
          echo "Passwords do not match.";
            return;
        }

        $salt = bin2hex(random_bytes(16));  // Generate a random salt
        $hashedPassword = $this->secureHash->hashPassword($password, $salt);  // Hash password with salt and pepper

        // Assign role based on email domain
        $role = (strpos($email, '@admin.com') !== false) ? 'admin' : 'user';

        // Generate a UUID for the user (instead of numeric user IDs)
        $uuid = $this->userModel->createUser($name, $email, $hashedPassword, $salt, $role);

        if ($uuid) {
            // If user registration is successful, send them an email
            //$this->sendRegistrationEmail($name, $email);
            // Redirect to login page
            header("Location:../public/login.php");
            // echo "User registered successfully.";
        } else {
            echo "Error registering user.";
            return ;
        }
    }

    private function sendRegistrationEmail($name, $email) {
        $mail = new PHPMailer(true);

        try {
            // Set mailer to use SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com';  // Set the SMTP server to send through
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@example.com';  // SMTP username
            $mail->Password = 'your_email_password';     // SMTP password
            $mail->SMTPSecure = 'tls';                   // Enable TLS encryption
            $mail->Port = 587;                           // TCP port to connect to

            // Recipients
            $mail->setFrom('your_email@example.com', 'Your App Name');
            $mail->addAddress($email, $name);  // Add the user's email

            // Content
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Registration Successful';
            $mail->Body    = "Dear $name, <br><br> Thank you for registering with us. Your account has been successfully created.";

            // Send the email
            $mail->send();
            echo "Email has been sent to $email.";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function login($email, $password) {
        // Fetch the user by email
        $user = $this->userModel->getUserByEmail($email);
    
        if ($user && $this->secureHash->verifyPassword($password, $user['password'], $user['salt'])) {
            // Start a secure session
            SessionManager::startSession();
            $_SESSION['uuid'] = $user['uuid'];
            $_SESSION['user_role'] = $user['role']; // Assuming 'role' is a column in your users table
    
            // Log the login activity
            $this->userModel->logUserActivity($user['uuid']);
            
            // Redirect to the admin dashboard if user is an admin
            if ($user['role'] === 'admin') {
                header("Location: ../public/admin_dashboard.php");
            } else {
                echo "Welcome, $user[name]!";
            }
            exit();
        } else {
            echo "Invalid email or password.";
        }
    }
}