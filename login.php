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
                width: 250px
            }

            legend {
                display: block;
                width: 100%;
                text-align: center;
            }

            body {
                justify-content: center;
                align-items: center;   
                height: 90vh;
            }

            #error {
                font-weight: bold;
                padding: 5px;
                color: rgb(255, 255, 255);
                text-align: center;
                background-color: rgb(255, 0, 0);
                border-radius: 15px; /* Curves the edges of the page */
            }
        </style>
</head>
<body>
    <?php
    session_start(); 
    $error = $_SESSION['error'] ?? ''; // the error message
    $backup = $_SESSION['backup'] ?? []; // An array of all the submitted values when the login button is pressed

    if (!empty($error ?? '')) { // If there's something stored in $error print it out above the login box
        echo "<p role=\"alert\" id=\"error\">{$error}</p>";
    }
    ?>
    <div id="Page"> 
        <form method="POST" action="login_process.php" aria-labelledby="login-title" style="text-align: center"> <!-- Sends all the data from the form to login_process.php -->
            <legend id="login-title">Admin Login</legend>
            <div>
                <input type="text" name="Username" id="Username" placeholder="Username" autofocus value="<?php echo $backup['Username'] ?? ''; ?>"> <!-- Sets the value to whatever was put into this field when the login button was pressed -->
            </div>
            <div>
                <input type="password" name="Password" id="Password" placeholder="Password" value="<?php echo $backup['Password'] ?? ''; ?>"> <!-- Sets the value to whatever was put into this field when the login button was pressed -->
            </div>
            <input class="button" type="submit" value="Login" style="align-self: center">
        </form>
    </div>
    <nav>
        <a href="index.php">GO BACK</a>
    </nav>
    <?php 
    unset($_SESSION['backup'], $_SESSION['error']); // Clears everything in $_SESSION['backup'] and $_SESSION['error'] so that they can be used next time the login button is pressed
    ?>
</body>
</html>