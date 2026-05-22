<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="description" content="The landing page for Horizon Industries' job application site">
    <meta name="keywords" content="application, jobs, apply, work, Horizon Industries">
    <meta name="author" content="Daniel Colegrove">
    <title>Welcome!</title>
    <link rel="stylesheet" href="styles/styles.css">
        <style>
            footer {
                display: flex; /* Makes the footer container a flexbox */
                height: 40px;
                background-color: black;
                color: aliceblue;
                align-items: center;
                justify-content: center;
                border-radius: 15px; /* Curves the edges of the footer */
                margin-top: 20px;
            }

            footer ul {
                list-style-type: none; /* Remove bullet points */
                padding: 0;
                margin: 0;
                overflow: hidden;
            }

            footer li {
                display: inline; /* Display list items in a horizontal line */
                margin-left: 10px; /* Add some spacing between items */
                margin-right: 10px;
            }

            footer a {
                text-decoration: none;
                color: rgb(255, 255, 255);
            }

            footer a:hover {
                background-color: #aeaeae;
                color: #383838;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Horizon Industries</h1>
        </header>
        <nav>
            <a href="index.php" class="CurrentPage">HOME</a>
            <a href="jobs.php">AVALIABLE JOBS</a>
            <a href="apply.php">APPLY NOW</a>
            <a href="about.php">ABOUT US</a>
        </nav>
        <div id="Page" style="flex-flow: column;">
            <a href="images/logo.png">  <img src="images/logo.png" alt="Our logo" title="Logo" style="display: flex; height: 15vw;"></a>
            <h2>Better living starts today.</h2>
            <h3 style="width: clamp(50vw, 60vw, 100%);">We here at Horizon Industries pride ourselves on our commitment to the lives of the people and the planet. We work closely with city councils and industry partners to develop and deploy plans that improve infrastructure and increase quality of life for those living within it as well as introducing smart transport solutions and renewable energy to improve sustainability.</h3>
            <form action="search" method="GET" style="margin: 20px;">
                <input type="search" name="q" placeholder="Search..." aria-label="Search">
                <button type="submit">Search</button>
            </form>
            <table style="outline: 2px; outline-color: black;">
                <caption>Table</caption>
                <thead>
                    <tr>
                        <th>One</th>
                        <th>Two</th>
                        <th>Three</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Four</td>
                        <td>Five</td>
                        <td>Six</td>
                    </tr>
                    <tr>
                        <td>Seven</td>
                        <td>Eight</td>
                        <td>Nine</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>   
                        <td colspan="2">OneHundred</td>
                        <td>Ten</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <footer>
            <ul>
                <li><a href="https://danielco.atlassian.net/jira/software/projects/PROJPT1/summary">Jira</a></li>
                <li><a href="https://github.com/105918849/Class-13-Group-2-Project.git">Github</a></li>
                <li><a href="mailto:info@horizonindustries.com">Email</a></li>
            </ul>
        </footer>
    </body>
</html>