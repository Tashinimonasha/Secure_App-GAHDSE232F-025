<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not authenticated
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Security Platform</title>
    <style>
        /* General body style */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2c3e50; /* Dark blue background */
            color: #ecf0f1; /* Light text color */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container styling */
        .container {
            width: 80%;
            background-color: #1c2833; /* Darker background for security theme */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        /* Dashboard header */
        h1 {
            text-align: center;
            color: #f1c40f; /* Highlighted color for dashboard */
            font-weight: 600;
            letter-spacing: 1px;
        }

        /* User info */
        .user-info {
            text-align: center;
            margin-bottom: 30px;
        }

        /* Card container */
        .cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        /* Individual card styles */
        .card {
            background-color: #34495e;
            border-radius: 10px;
            padding: 20px;
            width: 30%;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Card header */
        .card h3 {
            color: #f39c12; /* Emphasized heading */
            margin-bottom: 10px;
        }

        /* Card content */
        .card p {
            color: #bdc3c7;
        }

        /* Logout button */
        .logout-btn {
            background-color: #e74c3c; /* Red for logout */
            padding: 10px;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 150px;
            text-align: center;
            display: block;
            margin: 0 auto;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        /* Logout button hover */
        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Your Secure Dashboard, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>

        <div class="user-info">
            <p>Your session is secure. You are logged in as <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>.</p>
        </div>

        <div class="cards">
            <!-- Security Reports Card -->
            <div class="card">
                <h3>Security Reports</h3>
                <p>View the latest reports on potential security vulnerabilities and system audits.</p>
                <button class="btn">View Reports</button>
            </div>

            <!-- User Management Card -->
            <div class="card">
                <h3>User Management</h3>
                <p>Manage user roles, permissions, and monitor account activity for potential risks.</p>
                <button class="btn">Manage Users</button>
            </div>

            <!-- Settings Card -->
            <div class="card">
                <h3>Settings</h3>
                <p>Configure system security settings, multi-factor authentication (MFA), and encryption policies.</p>
                <button class="btn">System Settings</button>
            </div>
        </div>

        <!-- Logout Button -->
        <form method="POST" action="logout.php">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</body>
</html>
