<?php
session_start();
require_once 'db.php';

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
} elseif (isset($_COOKIE['remember_me'])) {
    $tokenParts = explode(':', $_COOKIE['remember_me']);
    if (count($tokenParts) == 2) {
        $loginEmail = $tokenParts[0];
        $stmt = $pdo->prepare("SELECT id, name FROM users WHERE email = ?");
        $stmt->execute([$loginEmail]);
        $user = $stmt->fetch();
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: dashboard.php");
            exit;
        }
    }
}

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    if ($email && $password) {
        $stmt = $pdo->prepare("SELECT id, name, password_hash FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            if ($remember) {

                $token = $email . ':' . bin2hex(random_bytes(16));
                setcookie('remember_me', $token, time() + (86400 * 30), "/"); 
            }
            header("Location: dashboard.php");
            exit;
        } else {
            $msg = "<span style='color:red;'>Invalid email or password.</span>";
        }
    } else {
        $msg = "<span style='color:red;'>Please fill all fields.</span>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .checkbox-container {
            display: flex;
            align-items: center;
            font-size: 12px;
            margin-bottom: 10px;
        }
        .checkbox-container input {
            width: auto;
            margin: 0 5px 0 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form id="loginForm" method="POST" action="index.php">
            <p>Email:</p>
            <input type="email" id="email" name="email" required>

            <p>Password:</p>
            <input type="password" id="password" name="password" required>

            <div class="checkbox-container">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
            </div>

            <p id="msg"><?php echo $msg; ?></p>

            <div class="submit-buttons">
                <button type="submit" style="flex: 1;">Login</button>
            </div>
        </form>
        <p style="text-align:center; margin-top:20px; font-size: 12px;">Don't have an account? <a href="register.php">Register</a></p>
    </div>
</body>
</html>
