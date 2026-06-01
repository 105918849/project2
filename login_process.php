<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The login processing page for Horizon Industries' job application site">
    <meta name="keywords" content="Horizon Industries">
    <meta name="author" content="Daniel Colegrove">
    <title>Login Process</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once("settings.php");

    $conn = mysqli_connect($host, $username, $password, $database);

    // Get user input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Simple query to check credentials
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
    $_SESSION['username'] = $user['username'];
    header("Location: welcome.php");
    exit();
    } else {
    echo "❌ Incorrect username or password.";
    }
?>
</body>
</html>