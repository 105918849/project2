<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The management query page for Horizon Industries' job application site">
    <meta name="keywords" content="Horizon Industries, manage, management, admin, system">
    <meta name="author" content="Daniel Colegrove">
    <title>Manage Query</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <?php
    session_start();
    require_once("settings.php");
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['log_out'])) { //if the user clicked the log out button
                session_unset();
                session_destroy();
                header("Location: index.php");
                exit();
            }

        if(isset($_POST['list_all'])) { //if the user clicked the list all button
                $query = "SELECT * FROM eoi;";
            }

        if(isset($_POST['Sort'])) { //if the user clicked the sort button 
            $sort = $_POST['Sort'] ?? '';

            if ($sort == "list_ref") { //if the user picked to sort by reference number
                $query = "SELECT * FROM eoi
                ORDER BY jrn ASC;";
            }

            if ($sort == "list_first") { //if the user picked to sort by first name
                $query = "SELECT * FROM eoi
                ORDER BY first_name ASC;";
            }

            if ($sort == "list_last") { //if the user picked to sort by last name
                $query = "SELECT * FROM eoi
                ORDER BY last_name ASC;";
            }

            if ($sort == "list_both") { //if the user picked to sort by both names
                $query = "SELECT * FROM eoi
                ORDER BY first_name ASC, last_name ASC;";
            }

            if ($sort == "list_gender") { //if the user picked to sort by gender
                $query = "SELECT * FROM eoi
                ORDER BY gender ASC;";
            }

            if ($sort == "list_address") { //if the user picked to sort by adress
                $query = "SELECT * FROM eoi
                ORDER BY address ASC, town ASC, state ASC, postcode ASC;";
            }

            if ($sort == "list_contacts") { //if the user picked to sort by contacts
                $query = "SELECT * FROM eoi
                ORDER BY email ASC, number ASC;";
            }

            if ($sort == "list_skills") { //if the user picked to sort by skills
                $query = "SELECT * FROM eoi
                ORDER BY skills ASC;";
            }

            if ($sort == "list_otherskills") { //if the user picked to sort by other skills
                $query = "SELECT * FROM eoi
                ORDER BY otherskills ASC;";
            }

            if ($sort == "list_status") { //if the user picked to sort by status
                $query = "SELECT * FROM eoi
                ORDER BY status ASC;";
            }
        }

        if(isset($_POST['delete'])) { //if the user wrote something in the delete secion
            $delete = clean_input($_POST['delete'] ?? ''); //the submitted JRN number
            $query = "DELETE FROM eoi WHERE jrn = '$delete';";
            $result = mysqli_query($conn, $query);
            if($result) {
                $query = "SELECT * FROM eoi;"; //then display updated table
            }
        }

        if(isset($_POST['change'])) { //if the user wrote something in the change secion
            $change = clean_input($_POST['change'] ?? ''); //the submitted EOI number
            $newstatus = clean_input($_POST['Status'] ?? ''); //the selected status to change to
            $query = "UPDATE eoi SET status = '$newstatus' WHERE eoinumber = '$change';";
            $result = mysqli_query($conn, $query);
            if($result) {
                $query = "SELECT * FROM eoi;";
            }
        }

        if(isset($query)) { //if the query is set, send it to manage.php to be executed
            $_SESSION['query'] = $query;

            header("Location: manage.php");
            exit();
            
        } else {
            header("Location: manage.php");
            exit();
        }
    } else {
        header("Location: manage.php");
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