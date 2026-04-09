<?php
require_once 'db.php';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $age = (int)($_POST['age'] ?? 0);

    if ($name && $email && $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password_hash, age) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $hash, $age]);
            $msg = "<span style='color:green;'>Registration successful! <a href='index.php'>Login here</a></span>";
        } catch (PDOException $e) {
            $msg = "<span style='color:red;'>Error: Email may already exist.</span>";
        }
    } else {
        $msg = "<span style='color:red;'>All fields are required!</span>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form id="registerForm" method="POST" action="register.php">
            <p>Name:</p>
            <input type="text" id="name" name="name" required>
            <span class="error" id="nameError">Need a name</span>

            <p>Email:</p>
            <input type="email" id="email" name="email" required>
            <span class="error" id="emailError">Invalid email</span>

            <p>Password:</p>
            <input type="password" id="password" name="password" required>
            <span class="error" id="passwordError">Password must be at least 6 characters</span>

            <p>Age:</p>
            <input type="number" id="age" name="age">
            <span class="error" id="ageError">Age 18-100</span>

            <p id="msg"><?php echo $msg; ?></p>

            <div class="submit-buttons">
                <button type="submit" style="flex: 1;">Register</button>
            </div>
        </form>
        <p style="text-align:center; margin-top:20px; font-size:12px;">Already have an account? <a href="index.php">Login</a></p>
    </div>
    <script src="script.js"></script>
</body>
</html>
