<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <a href="upload.php">Upload Profile Picture</a>
    <br>
    <?php if (isset($_GET['picture'])): ?>
        <img src="<?= $_GET['picture']; ?>" alt="" srcset="">
    <?php endif?>
    <a href="logout.php">Logout</a>
</body>
</html>
