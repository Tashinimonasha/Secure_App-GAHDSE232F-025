
# Secure_App

**Secure_App** is a robust and secure PHP web application designed to implement Authentication, Authorization, and Accounting (AAA) principles. The application uses PHP and MySQL to provide secure user registration, login functionality, and an admin dashboard for managing users. This project does not use PHP frameworks but incorporates modern security practices to ensure a safe and efficient user experience.

## Features

- **User Registration & Login**: Secure user registration with email verification and login functionality.
- **Password Hashing**: Utilizes SHA-256 hashing with salt and pepper for secure password storage.
- **Email Notifications**: Sends confirmation emails upon successful registration.
- **Admin Dashboard**: Provides a secure dashboard for administrators to view and manage users.
- **Session Management**: Implements secure session handling and session regeneration.
- **Role-Based Access Control**: Differentiates between admin and regular user roles with appropriate access permissions.
- **Error Handling**: Displays error messages through popup notifications for user feedback.

## Project Structure

- **`public/`**: Contains publicly accessible files.
  - `index.php`: Entry point for registration and login functionality.
  - `admin_dashboard.php`: Admin dashboard for managing users.
  - `logout.php`: Handles user logout.
- **`app/`**: Contains application-specific code.
  - **`controllers/`**: Contains controllers for handling business logic.
    - `AuthController.php`: Manages user authentication and registration.
  - **`models/`**: Contains models for database interactions.
    - `UserModel.php`: Handles user-related database operations.
  - **`views/`**: Contains HTML views for registration and login forms.
- **`core/`**: Contains core utilities and security components.
  - `SessionManager.php`: Manages session creation and destruction.
  - `SecureHash.php`: Provides methods for password hashing and verification.
- **`config/`**: Contains configuration files for database connection.
  - `database.php`: Database connection settings.
- **`css/`**: Contains stylesheets for application styling.
  - `style.css`: The main stylesheet for the application.

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/Secure_App.git
   ```

2. **Navigate to the project directory:**
   ```bash
   cd Secure_App
   ```

3. **Install dependencies using Composer (if applicable):**
   ```bash
   composer install
   ```

4. **Configure the database:**
   - Edit the `config/database.php` file to include your database credentials.

5. **Set up the database:**
   - Create the necessary tables and insert initial data as described in the `app/models/UserModel.php` file.

6. **Start the PHP built-in server (optional for development):**
   ```bash
   php -S localhost:8000 -t public/
   ```

7. **Open your browser and navigate to `http://localhost:8000` to access the application.**

## Usage

- **Registration**: Navigate to `public/register.php` to register a new user.
- **Login**: Navigate to `public/login.php` to log in.
- **Admin Dashboard**: If logged in as an admin, you will be redirected to `public/admin_dashboard.php`.

## Security Considerations

- **Password Storage**: Passwords are hashed using SHA-256 with salt and pepper for security.
- **Session Management**: Sessions are securely managed and regenerated on login.
- **Input Validation**: User input is validated and sanitized to prevent security vulnerabilities.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your changes.

## License

MIT License

Copyright (c) 2024 Tashini Monasha

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

Create this for Software Security project
 
 ****watch my website at https://tashini.infinityfreeapp.com/
 
 
