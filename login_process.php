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

    if($_SERVER["REQUEST_METHOD"] == "POST") { //check if the user got here through the searchbar or through pressing the login button

        $conn = mysqli_connect($host, $user, $pwd, $sql_db);

        $username = clean_input($_POST['Username'] ?? '');
        $password = clean_input($_POST['Password'] ?? '');

        $error = "Incorrect username or password";

        $stmt = $conn->prepare("SELECT * FROM management WHERE username = ? AND password = ?"); //checks to see if the entered values match with the stored ones safely
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = mysqli_fetch_assoc($result);

        if ($user) { //if true, regenerate the session id and set the user's session, then send them to manage.php
            session_regenerate_id(true);
            $_SESSION['username'] = $user['username'];
            header("Location: manage.php");
            exit();
        } else {
            $_SESSION['error'] = $error; //if false, pass the error back to login.php to display

            $_SESSION['backup'] = [ //store the previously send values to past back into the fields for easier resubmission
                'Username' => $username,
                'Password' => $password,
            ];
            header("Location: login.php");
            exit();
        }
    } else {
        header("Location: login.php");
        exit();
    }

    function clean_input($data) { // Runs all passed data through the three cleaning functions to make sure it is safe to use and display
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
</body>
</html>