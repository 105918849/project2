<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The landing page for Horizon Industries' job application site">
    <meta name="keywords" content="application, jobs, apply, work, Horizon Industries">
    <meta name="author" content="Daniel Colegrove">
    <title>Welcome!</title>
    <link rel="stylesheet" href="styles/styles.css">
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                margin: 1em;
            }

            input, button {
                font-size: 1em;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Horizon Industries</h1>
        </header>
        <?php include 'nav.inc'; ?> <!-- Navagation menu that links to the other pages and darkens when you hover over them -->
        <div id="Page" style="flex-flow: column;">
            <form action="search" method="GET" style="margin: 20px;">
                <input type="search" name="q" placeholder="Search..." aria-label="Search"> <!-- Search bar -->
                <button type="submit">Search</button>
            </form>
            <img src="images/logo.png" alt="Our logo" title="Logo" style="display: flex; height: 15vw;"> <!-- Logo that's height displays at 15% of the current viewport width -->
            <h2>Better living starts today.</h2>
            <h3 style="width: clamp(50vw, 60vw, 100%);">We here at Horizon Industries pride ourselves on our commitment to the lives of the people and the planet. We work closely with city councils and industry partners to develop and deploy plans that improve infrastructure and increase quality of life for those living within it as well as introducing smart transport solutions and renewable energy to improve sustainability.</h3> <!-- The clamp tag fanctions by setting a minimum, preferred and maximum value. This has been set to prevent the textbox from stretching the whole way across the page and looking ugly on a computer (50vw) while being able to fill more of the screen as the screen gets smaller so it doesn't get squished on a phone (100%) -->
            <table>
                <caption>Our Impact</caption>
                <thead>
                    <tr>
                        <th>Infrastructure</th>
                        <th>Base</th>
                        <th>Ours</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: bold;">Transport</td>
                        <td>Basic</td>
                        <td>Smart</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Energy</td>
                        <td>Unmonitored</td>
                        <td>Monitored</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Urban services</td>
                        <td>Unmanaged</td>
                        <td>Managed</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>   
                        <td colspan="2">Overall?</td>
                        <td>Much better</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php include 'footer.inc'; ?>
    </body>
</html>