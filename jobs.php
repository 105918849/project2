<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="jobs" />
  <meta name="keywords" content="job, describe, job description,  job position" />
  <meta name="author" content="Tanadol Baibong"  />
  <title>Jobs</title>
    
  <link rel="stylesheet" href="styles/styles.css">
    <style>
        /* Make a banner for h2 */
        .look { 
            color: rgb(0, 0, 0);
            text-align: center;  
            text-decoration: underline;
            background-color: aliceblue;
            border: 10px solid aliceblue;
            border-radius: 15px;
        }

        /* Adjust the jobs image centred*/
        .images {   
        display: block; 
        margin: 20px auto; 
        max-width: 100%; 
        height: auto;   
        }

        .skills {
            font-weight: bold;
            text-decoration-line: underline;
        }
        /* Highlights the required skills section headers */
        #container {
            display: flex;
            justify-content: space-evenly;
        }

        /* Styles individual job list */
        .job { 
            font-size: 18px;
            width: 85%;
            margin: 1em 0;
            border: 10px groove rgb(0, 0, 0);
            border-radius: 15px; /* Curves the edges of the job elements */
            background-color: rgb(255, 243, 198);
            flex-direction: column;
            
        }

        #architect {
            border: 2px solid black;
            border-radius: 15px;
            background-color: white;
            font-size: 35px;
            text-align: center;
            margin-bottom: 100px;
        }

        #manager {
            border: 2px solid black;
            border-radius: 15px;
            background-color: white;
            font-size: 35px;
            text-align: center;
            margin-bottom: 115px;
            
        }
        /* Highlights the key responsibilities headers */
        .response {
            font-weight: bold;
            text-decoration: underline;
        }
        /* Styles the apply buttons */
        .buttons {
            color: black;
            text-decoration:solid;
            text-align: center;
            background-color: rgb(255, 248, 248);
            border: 3px solid black;
            font-size: 20px;
            padding: 0.5em;
            cursor: pointer;
        }

        /* Hover effect for apply buttons */
        .buttons:hover {
            background-color: rgb(199, 239, 214);
        }

        /* Styles inside the joblists sections */
        section a {
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: normal;
            padding: 5em;
            border-radius: 15px;
            margin: 40px;
        }
        /* Make jobs stay at the center */
        #jobrender {
             display: flex;
             flex-wrap: wrap;
             justify-content: center;
        }
        /* Styles serachbar background by using aside */
        aside {
            float: right;
            width: 25%;
            margin: 20px ;
            margin-left: auto;
            padding: 20px;
            background-color: aliceblue;
            border: 5px solid black;
            border-radius: 15px;
        }
    </style>
 </head>

 <body>
 <?php
 // start the session
 session_start();
 //import setting.php
 require_once("settings.php");
 $conn = mysqli_connect($host, $user, $pwd, $sql_db); //connect to database
 $searched = false; // check if searched
 ?>
 <header id="jobhead">  
    <h1 style="color: rgb(255, 176, 40);">Job opportunities</h1>
 </header>


 <?php include 'nav.inc'; ?>

<div class="look">
 <h2>
    <em>Our Company is looking for new team members!</em><br>
    <em>Take your opportunity to apply now!</em>
 </h2>

</div>
 
 <aside class="searchbar">
    <form action="search.php" method="POST">
        <label for="search"><strong>Search Jobs: </strong></label>
        <input type="text" name="search" id="search" placeholder="Search for jobs">
        <button type="submit">Search</button>
    </form>
</aside>

<?php
// if a searched, use the session to show the job
if (isset($_SESSION['result'])) {
    $search = mysqli_real_escape_string($conn, $_SESSION['result']);
    $result = mysqli_query($conn, "SELECT * FROM jobs WHERE title LIKE '%$search%' OR job_ref LIKE '%$search%'");
    $searched = true;
    unset($_SESSION['result']); // clear the session
} else {
    $result = mysqli_query($conn, "SELECT * FROM jobs"); // show all the jobs
}
?>

<section id="jobrender">
 <?php 
 // Loop through each job returned from the database
if ($result && mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {  

    //Display jobs
    echo '<section class="job">';
    echo '<h1 class="look"><strong>' . $row['title'] . '</strong></h1>';
    echo '<img class="images" src="images/job' . $row['jobid'] . '.png" alt="job image" width="300" height="400">';
    echo '<p><strong>Job Description: </strong>' . $row['description'] . '</p>';

    // Display job details as a list
    echo '<ul>';
    echo '<li>Reference: ' . $row['job_ref'] . '</li>';
    echo '<li>Salary: ' . $row['salary'] . '</li>';
    echo '<li>Reporting Line: ' . $row['reporting_line'] . '</li>';
    echo '</ul>';

    // Display key responsibilities
    echo '<p class="response">Key Responsibilities</p>';  
    echo '<ol>';
    $responsibilities = explode("\n", $row['responsibilities']);
    foreach ($responsibilities as $item) {
        echo '<li>' . ltrim($item, '1234567890.') . '</li>';
    }
    echo '</ol>';

    // Display required skills
    echo '<p class="skills">Required Skills</p>';
    echo '<ol>';
    $skills = explode("\n", $row['skills']);
    foreach ($skills as $item) {
        echo '<li>' . $item . '</li>';
    }
    echo '</ol>';
    // Display apply button linking to apply.php
    echo '<a href="apply.php?job_ref=' . $row['job_ref'] . '" class="buttons">Click here to apply</a>';
    echo '</section>';
}
 } else if ($searched) { 
     echo '<h3 style="text-align:center; width:100%; background-color: aliceblue; border: 5px solid black;">No jobs found matching your search.</h3>'; // Show a message if they searched for a job that doesn't exist or something that doesn't match
 }
    // Close the database connection
     mysqli_close($conn);
 ?>
</section>

 <?php include 'footer.inc'; ?>
</body>


   </html>

 
