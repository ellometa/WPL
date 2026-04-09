<?php
$_SERVER["REQUEST_METHOD"] = "POST";
$_POST["add"] = 1;
$_POST["name"] = "Alice Wonderland";
$_POST["email"] = "alice@example.com";
$_POST["role"] = "Student";

include "index.php";
?>
