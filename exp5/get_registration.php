<?php
function clean ($data) {
    return htmlspecialchars(trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $name = clean($_GET['name']);
    $email = clean($_GET['email']);
    $password = clean($_GET['password']);
    $age = clean($_GET['age']);

    echo "<h2>GET METHOD</h2>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Age: $age <br>";
}
?>
