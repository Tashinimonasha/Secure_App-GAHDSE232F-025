<?php
session_start(); 

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once '../app/models/UserModel.php';
$userModel = new UserModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_user'])) {
        $userModel->deleteUser($_POST['user_id']);
        header("Location: admin_dashboard.php"); // Refresh to reflect changes
        exit();
    }

    if (isset($_POST['update_role'])) {
        $userModel->updateUserRole($_POST['user_id'], $_POST['new_role']);
        header("Location: admin_dashboard.php");
        exit();
    }
    
    if (isset($_POST['grant_access'])) {
        $userModel->setAccessGranted($_POST['user_id'], true); // Grant access
        header("Location: admin_dashboard.php"); // Refresh to reflect changes
        exit();
    }
}

$users = $userModel->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="dashcontainer">
        <form method="POST" action="logout.php" style="width:120px; padding-left: 92%; padding-top: 20px;">
            <button type="submit" class="btn" style="background-color: red">Logout</button>
        </form>
        <h2>Admin Dashboard</h2>
        <p>Welcome, Admin!</p>

        <h3>User List</h3>
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($users) > 0): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['id']); ?></td>
                            <td><?php echo htmlspecialchars($user['name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['role']); ?></td>
                            <td>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                    <button type="submit" name="delete_user" class="btn-delete">Delete</button>
                                </form>

                                <!-- Show the Grant Access button only for users with the role of 'admin' -->
                                <?php if ($user['role'] === 'admin'): ?>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                        <button type="submit" name="grant_access" class="btn-grant">Grant Access</button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
