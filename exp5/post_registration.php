<?php
function clean ($data) {
    return htmlspecialchars(trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = clean($_POST['name']);
    $email = clean($_POST['email']);
    $password = clean($_POST['password']);
    $age = clean($_POST['age']);

    if (!$name || !$email || !$password || !$age) {
        echo "All fields required!";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email!";
        exit;
    }

    echo "<h2>POST METHOD</h2>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Age: $age <br>";
}
?>
