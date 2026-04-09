<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$userName = htmlspecialchars($_SESSION['user_name'] ?? 'User');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container { 
            width: 500px; 
            text-align: center; 
        }
        .welcome { 
            font-size: 24px; 
            margin-bottom: 20px; 
            color: #333; 
        }
        .logout-btn-wrapper {
            margin-top: 30px;
        }
        .logout-btn { 
            background-color: #d9534f; 
            color: white; 
            border: none; 
            padding: 10px 15px; 
            cursor: pointer; 
            border-radius: 4px; 
            text-decoration: none;
            font-size: 14px;
        }
        .logout-btn:hover { 
            background-color: #c9302c; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="welcome">Welcome to your Dashboard, <?php echo $userName; ?>!</h2>
        <p style="font-size: 14px; line-height: 1.5;">You have successfully logged in.<br>An active session is currently running.</p>

        <div class="logout-btn-wrapper">
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
</body>
</html>
