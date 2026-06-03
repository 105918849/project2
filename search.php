<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The search page for Horizon Industries' job application site">
    <meta name="keywords" content="Horizon Industries">
    <meta name="author" content="Tanadol Baibong">
    <title>Search</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
 <body>
<?php
//start the session
session_start();

//check if there is a information on searchbar
if (isset($_POST['search'])) {
    $_SESSION['result'] = $_POST['search'];
}

// get back to jobs.php
header("Location: jobs.php");
exit();
?>
</body>
</html>