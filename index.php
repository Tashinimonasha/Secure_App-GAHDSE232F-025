<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SECURE APP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('image3.jpg'); /* Replace with your background image */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
        }
        h1 {
            color: black;
            font-size: 36px;
            margin-bottom: 30px;
            letter-spacing: 2px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .btn {
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            outline: none;
            width: 45%;
            color: white;
        }
        .btn-on {
            background: linear-gradient(45deg, #2ecc71, #27ae60);
            box-shadow: 0 5px 10px rgba(46, 204, 113, 0.4);
        }
        .btn-on:hover {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            box-shadow: 0 8px 15px rgba(46, 204, 113, 0.7);
        }
        .btn-off {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            box-shadow: 0 5px 10px rgba(231, 76, 60, 0.4);
        }
        .btn-off:hover {
            background: linear-gradient(45deg, #c0392b, #e74c3c);
            box-shadow: 0 8px 15px rgba(231, 76, 60, 0.7);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome to SECURE APP</h1>
        <!-- Button Container -->
        <div class="button-container">
            <!-- ON Button -->
            <button class="btn btn-on" onclick="onAction()">ON</button>

            <!-- OFF Button -->
            <button class="btn btn-off" onclick="offAction()">OFF</button>
        </div>
    </div>

    <script>
        function onAction() {
            window.location.href = 'public/login.php';  // Redirect to login page when ON button is pressed
        }

        function offAction() {
            alert('OFF: No action taken');  // Display a message when OFF button is pressed
        }
    </script>

</body>
</html>
