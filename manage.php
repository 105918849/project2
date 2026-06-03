<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The management page for Horizon Industries' job application site">
    <meta name="keywords" content="Horizon Industries, manage, management, admin, system">
    <meta name="author" content="Daniel Colegrove">
    <title>Manage</title>
    <link rel="stylesheet" href="styles/styles.css">
        <style>
            table, th, td {
                align-self: center;
                border: 1px solid black;
                border-collapse: collapse;
                margin: 1em;
                background: white;
                padding: 1em;
                font-size: clamp(0.4em, 1vw, 1em);
            }

            input, button {
                font-size: clamp(0.6em, 1vw, 1em);
            }

            form {
                display: inline;
                margin: 1em;
            }

            select {
                font-size: clamp(0.4em, 1vw, 0.8em);
            }

            div {
                align-self: center;
            }

            .info {
                font-weight: bold;
                color: rgb(0, 0, 0);
                text-align: center;
                background-color: rgb(255, 255, 255);
                border-radius: 15px; /* Curves the edges of the container */
            }
        </style>
</head>

<body>
    <?php
    session_start();
    require_once("settings.php");

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    $query = $_SESSION['query'] ?? '';
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    ?>
    <nav>
        <form method="POST" action="manage_query.php">
        <button type="submit" name="log_out" style="position: absolute; top: 50px; right: 50px; background: white; color: black;">Log out</button>
        </form>
    </nav>
    <h1>
        Welcome, <?php echo $_SESSION['username']; ?>
    </h1>
    <div>
        <form method="POST" action="manage_query.php">
            <button type="submit" name="list_all">List all EOIs</button>
        </form>
        <form method="POST" action="manage_query.php">
            <select name="Sort" id="Sort">
                <option value="">List by?</option>			
                <option value="list_ref">Reference number</option>
                <option value="list_first">First name</option>
                <option value="list_last">Last name</option>
                <option value="list_both">First and last name</option>
                <option value="list_gender">Gender</option>
                <option value="list_address">Address</option>
                <option value="list_contacts">Contacts</option>
                <option value="list_skills">Skills</option>
                <option value="list_otherskills">Otherskills</option>
                <option value="list_status">Status</option>
            </select>
            <button type="submit">Sort</button>
        </form>
        <form method="POST" action="manage_query.php">
            <label class="info" for="delete">Delete EOI by JRN</label>
            <input type="text" name="delete" placeholder="JRN" style="width: 60px;">
            <button type="submit">Delete</button>
        </form>
        <form method="POST" action="manage_query.php">
            <label class="info" for="change">Change status by EOInumber</label>
            <input type="text" name="change" placeholder="EOI#" style="width: 40px;">
            <select name="Status" id="Status">
                <option value="">Change status?</option>			
                <option value="New">New</option>
                <option value="Current">Current</option>
                <option value="Final">Final</option>
            </select>
            <button type="submit">Change</button>
        </form>
    </div>
    <?php
    if(!empty($query)) { //if the query send back from manage_query.php is not empty, run
        $result = mysqli_query($conn, $query);
        if($result) {
            if(mysqli_num_rows($result) > 0) { //if there are more than 0 rows in the table, execute
                echo "<table>";
                echo "<tr>";
                echo "<th>EOInumber</th>";
                echo "<th>JRN</th>";
                echo "<th>First name</th>";
                echo "<th>Last name</th>";
                echo "<th>Date of birth</th>";
                echo "<th>Gender</th>";
                echo "<th>Address</th>";
                echo "<th>Contacts</th>";
                echo "<th>Skills</th>";
                echo "<th>Other skills</th>";
                echo "<th>Status</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_assoc($result)) { //while there is a row, run and then return to check if there's another row to run for
                    echo "<tr>";
                    echo "<td style=\"text-align: center; font-weight: bold;\">" . $row['eoinumber'] . "</td>";
                    echo "<td>" . $row['jrn'] . "</td>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['dob'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['address'] .", " . $row['town'] .", " . $row['state'] .", " . $row['postcode'] . "</td>";
                    echo "<td>" . $row['email'] .", " . $row['number'] . "</td>";
                    echo "<td>" . $row['skills'] . "</td>";
                    echo "<td>" . $row['otherskills'] . "</td>";
                    echo "<td style=\"text-align: center; font-weight: bold;\">" . $row['status'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<h1>There are no EOIs to display.</h1>";
            }
        } else {
            echo "<p>Query failed</p>";
        }
    }
    unset($_SESSION['query']); // Clears the query stored in $_SESSION['query'] so that it can be used next time a button is pressed
    ?>
</body>
</html>