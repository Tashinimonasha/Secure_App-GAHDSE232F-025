<?php
require_once '../core/SessionManager.php';

// Start the session to access session variables
SessionManager::startSession();

// Check if the user is logged in
if (!isset($_SESSION['uuid'])) {
    header("Location: login.php");
    exit();
}

// Fetch the user's name from the session
$userName = $_SESSION['user_name'] ?? 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <!-- Welcome and Logout in the upper right -->
    <div class="header">
        <p>Welcome, <?= htmlspecialchars($userName); ?>!</p>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Content with product cards -->
    <div class="content">
        <div class="card">
            <img src="images/ring.png" alt="Product 1">
            <h2>Gold Ring</h2>
            <p>22KT YELLOW GOLD LADIES RING (RI0002525)</p>
            <a href="#">Buy Now</a>
        </div>
        <div class="card">
            <img src="images/chain.png" alt="Product 2">
            <h2>Gold Chain</h2>
            <p>22KT YELLOW GOLD HAND CRAFTED NECKLACE STUDDED WITH BEST QUALITY SWAROVSKI ZIRCONIA STONES</p>
            <a href="#">Buy Now</a>
        </div>
        <div class="card">
            <img src="images/bacelet.png" alt="Product 3">
            <h2>Gold Bracelet</h2>
            <p>22KT YELLOW GOLD LADIES BRACELET STUDDED WITH 10 CUBIC ZIRCONIA</p>
            <a href="#">Buy Now</a>
        </div>
        <div class="card">
            <img src="images/earning.png" alt="Product 4">
            <h2>Gold Earing</h2>
            <p>22KT Y/GOLD S/S EAR STUD WITH STONE</p>
            <a href="#">Buy Now</a>
        </div>
    </div>

</body>
</html>
