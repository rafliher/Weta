<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["profilePicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
        $uploadOk = 0;
    }


    // If $uploadOk is set to 0, an error occurred
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Upload the file
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
            require_once 'db_config.php';

            $username = $_SESSION['username'];

            $sql = "UPDATE users SET profile_picture = '$targetFile' WHERE username = '$username'";

            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully.";
            } else {
                echo "Error updating profile picture: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Profile Picture</title>
</head>
<body>
    <h1>Upload Profile Picture</h1>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="profilePicture" required>
        <br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
