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
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Horizon Industries</h1>
        </header>
        <?php include 'nav.inc'; ?>
        <div id="Page" style="flex-flow: column;">
            <img src="images/logo.png" alt="Our logo" title="Logo" style="display: flex; height: 15vw;">
            <h2>Better living starts today.</h2>
            <h3 style="width: clamp(50vw, 60vw, 100%);">We here at Horizon Industries pride ourselves on our commitment to the lives of the people and the planet. We work closely with city councils and industry partners to develop and deploy plans that improve infrastructure and increase quality of life for those living within it as well as introducing smart transport solutions and renewable energy to improve sustainability.</h3>
            <form action="search" method="GET" style="margin: 20px;">
                <input type="search" name="q" placeholder="Search..." aria-label="Search">
                <button type="submit">Search</button>
            </form>
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