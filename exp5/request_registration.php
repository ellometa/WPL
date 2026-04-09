<?php
function clean ($data) {
    return htmlspecialchars(trim($data));
}

$name = clean($_REQUEST['name'] ?? '');
$email = clean($_REQUEST['email'] ?? '');
$password = clean($_REQUEST['password'] ?? '');
$age = clean($_REQUEST['age'] ?? '');

echo "<h2>REQUEST METHOD</h2>";
echo "Name: $name <br>";
echo "Email: $email <br>";
echo "Age: $age <br>";
?>
