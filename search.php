<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The search page for Horizon Industries' job application site">
    <meta name="keywords" content="Horizon Industries">
    <meta name="author" content="Daniel Colegrove">
    <title>Search</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<?php
//import setting.php for one time
require_once("settings.php");
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
$result = false; 

//ask the database for jobs if the user actually typed something and match search
if(isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM jobs WHERE title LIKE '%$search%' OR job_ref LIKE '%$search%'";

//run the query
    $result = mysqli_query($conn, $sql);
}
?>
</body>
</html>