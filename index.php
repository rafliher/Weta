<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Web Application</title>
</head>
<body>
    <h1>Welcome to the Web Application</h1>
    <a href="register.php">Register</a>
    <br>
    <a href="login.php">Login</a>
</body>
</html>
