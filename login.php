<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The admin login page for Horizon Industries' job application site">
    <meta name="keywords" content="Horizon Industries">
    <meta name="author" content="Daniel Colegrove">
    <title>Login</title>
    <link rel="stylesheet" href="styles/styles.css">
        <style>
            #Page {
                justify-content: center;
                align-self: center;
                width: 250px
            }

            legend {
                display: block;
                width: 100%;
                text-align: center;
            }
        </style>
</head>
<body>
    <?php
    session_start(); 
    $backup = $_SESSION['backup'] ?? []; // An array of all the submitted values when the login button is pressed
    ?>
    <div id="Page"> 
        <form method="POST" action="login_process.php" style="text-align: center"> <!-- Sends all the data from the form to login_process.php -->
            <legend>Admin Login</legend>
            <div>
                <input type="text" name="Username" id="Username" placeholder="Username" value="<?php echo $backup['Username'] ?? ''; ?>"> <!-- Sets the value to whatever was put into this field when the login button was pressed -->
            </div>
            <div>
                <input type="text" name="Password" id="Password" placeholder="Password" value="<?php echo $backup['Password'] ?? ''; ?>"> <!-- Sets the value to whatever was put into this field when the login button was pressed -->
            </div>
            <input class="button" type="submit" value="Login" style="align-self: center">
        </form>
    </div>
    <nav>
        <a href="index.php">GO BACK</a>
    </nav>
    <?php 
    unset($_SESSION['backup']); // Clears everything in $_SESSION['backup'] so that it can be used next time the login button is pressed
    ?>
</body>
</html>