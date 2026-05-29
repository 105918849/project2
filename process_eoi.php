<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The processing page for Horizon Industries' job application site">
    <meta name="keywords" content="Horizon Industries">
    <meta name="author" content="Daniel Colegrove">
    <title>Process</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once("settings.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $conn = mysqli_connect($host, $user, $pwd, $sql_db);

        $createTable = "CREATE TABLE IF NOT EXISTS eoi(
            id INT AUTO_INCREMENT PRIMARY KEY,
            jrn CHAR(5),
            first_name VARCHAR(20),
            last_name VARCHAR(20),
            dob VARCHAR(10),
            gender VARCHAR(20),
            address VARCHAR(40),
            town VARCHAR(40),
            state VARCHAR(3),
            postcode VARCHAR(4),
            email VARCHAR(100),
            number VARCHAR(12),
            skills VARCHAR(100),
            otherskills TEXT,
            status ENUM('New', 'Current', 'Final') DEFAULT 'New'
        )"; // As the command name suggests, it creats a table if one by the specified name doesn't already exist

        mysqli_query($conn, $createTable);

        $errors = ['jrn' => '', 'fname' => '', 'lname' => '', 'dob' => '', 'gender' => '', 'address' => '', 'town' => '', 'state' => '', 'postcode' => '', 'email' => '', 'number' => '', 'skills' => '']; // Initialises the $errors array with predifined names for use later when reporting errors

        $jrn = clean_input($_POST['JRN'] ?? '');
        $fname = clean_input($_POST['Fname'] ?? '');
        $lname = clean_input($_POST['Lname'] ?? '');
        $dob = clean_input($_POST['DOB'] ?? '');
        $gender = clean_input($_POST['Gender'] ?? '');
        $address = clean_input($_POST['Address'] ?? '');
        $town = clean_input($_POST['Town'] ?? '');
        $state = clean_input($_POST['State'] ?? '');
        $postcode = clean_input($_POST['Postcode'] ?? '');
        $email = clean_input($_POST['Email'] ?? '');
        $number = clean_input($_POST['Number'] ?? '');
        $skills = array_map('clean_input', $_POST['Skill'] ?? []); // applies clean_input to each item in the array
        $skills = implode(", ", $skills); // converts the array into a string, placing commas and spaces between each item
        $otherskills = clean_input($_POST['OtherSkills'] ?? '');

        if (empty($jrn)) {
            $errors['jrn'] = "JRN is required";
        } elseif (!preg_match("/^[0-9a-zA-Z]{5}$/", $jrn)) { // Pattern only allows 5 Alphanumeric digits
            $errors['jrn'] = "Invalid JRN";
        }

        if (empty($fname)) {
            $errors['fname'] = "First name is required";
        } elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $fname)) { // Pattern only accepts an input of Alphabet characters between the amount of 1 and 20
            $errors['fname'] = "First name must contain only letters and be a maximum of 20 characters";
        }

        if (empty($lname)) {
            $errors['lname'] = "Last name is required";
        } elseif (!preg_match("/^[a-zA-Z]{1,20}$/", $lname)) { // Pattern only accepts an input of Alphabet characters between the amount of 1 and 20
            $errors['lname'] = "Last name must contain only letters and be a maximum of 20 characters";
        }

        if (empty($dob)) {
            $errors['dob'] = "Date of birth is required";
        } elseif (!preg_match("/^(0?[1-9]|[12][0-9]|3[0-1])\/(0?[1-9]|1[0-2])\/\d{4}$/", $dob)) { //Pattern only allows 1 to 31 in the days category, 1 to 12 in the months category, and any four digit number from 0000 to 9999 in the years category
            $errors['dob'] = "Invalid birthday format";
        }

        if (empty($gender)) {
            $errors['gender'] = "Gender is required";
        }

        if (empty($address)) {
            $errors['address'] = "Address is required";
        } elseif (!preg_match("/^.{1,40}$/", $address)) { // Pattern takes any input as long as it is between 1 and 40 characters long
            $errors['address'] = "Address must be a maximum of 40 characters";
        }

        if (empty($town)) {
            $errors['town'] = "Suburb/Town is required";
        } elseif (!preg_match("/^.{1,40}$/", $town)) { // Pattern takes any input as long as it is between 1 and 40 characters long
            $errors['town'] = "Suburb/Town must be a maximum of 40 characters";
        }

        if (empty($state)) {
            $errors['state'] = "State is required"; // Since the first option has no given value, it will submit a blank, making it required to select a different option
        }

        if (empty($postcode)) {
            $errors['postcode'] = "Postcode is required";
        } elseif (!preg_match("/^[0-9]{4}$/", $postcode)) { // Pattern only accepts a string of four numbers
            $errors['postcode'] = "Postcode must contain only numbers and be exactly 4 characters";
        }

        if (empty($email)) {
            $errors['email'] = "Email is required";
        } elseif (!preg_match("/^[a-zA-Z0-9]+@[a-zA-Z0-9.]+\.[a-z]{2,4}$/", $email)) { // Pattern only accepts valid email formats, checking for an @ and allowing for as many .s as are required as long as it is followed by between 2 and 4 letters
            $errors['email'] = "Invalid email format";
        }

        if (empty($number)) {
            $errors['number'] = "Phone number is required";
        } elseif (!preg_match("/^[0-9]{8,12}$/", $number)) { // Pattern only accepts a string of between 8 and 12 numerical characters
            $errors['number'] = "Phone number must contain only numbers and be between 8 and 12 characters";
        }

        if (empty($skills)) {
            $errors['skills'] = "Please select at least 1 skill";
        }

        $hasErrors = false;

        foreach ($errors as $error) {
            if (!empty($error)) {
                $hasErrors = true;
                break;
            }
        }

        if ($hasErrors) {
            $_SESSION['errors'] = $errors;

            $_SESSION['backup'] = [
                'JRN' => $jrn,
                'Fname' => $fname,
                'Lname' => $lname,
                'DOB' => $dob,
                'Gender' => $gender,
                'Address' => $address,
                'Town' => $town,
                'State' => $state,
                'Postcode' => $postcode,
                'Email' => $email,
                'Number' => $number,
                'Skill' => $skills,
                'OtherSkills' => $otherskills
            ];

            header("Location: apply.php");
            exit();
        }

        $query = "INSERT INTO eoi (jrn, first_name, last_name, dob, gender, address, town, state, postcode, email, number, skills, otherskills) VALUES ('$jrn', '$fname', '$lname', '$dob', '$gender', '$address', '$town', '$state', '$postcode', '$email', '$number', '$skills', '$otherskills')";
        $result = mysqli_query($conn, $query);

        if ($result) {
        $id = mysqli_insert_id($conn);
        echo "<header><h1>✅ Thank you for your interest, we will look at your application shortly.<br> Your application reference number is: $id</header></h1>";
        session_unset();
        session_destroy();
        } else {
        echo "<header><h1>❌ Application unsuccessful. Please <a href='apply.php'>try again</a>.</h1></header>";
        }
    } 
    else {
        header('Location: apply.php');
    }

    function clean_input($data) { // Runs all passed data through the tree cleaning functions to make sure it is safe to use and display
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
?>
</body>
</html>