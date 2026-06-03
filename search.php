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

$conn = @mysqli_connect($host, $user, $pwd, $sql_db); // connect to database
$search = mysqli_real_escape_string($conn, $_POST['search']);
$result = mysqli_query($conn, "SELECT * FROM jobs WHERE title LIKE '%$search%' OR job_ref LIKE '%$search%'");  // search in database for jobs that matched
?>

<!-- include jobs.php to search.php for sending result -->
<?php include 'jobs.php'; ?> 

</body>
</html>