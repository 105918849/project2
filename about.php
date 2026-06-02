<?php 
// Include the database connection file
require_once 'settings.php'; 

// Fetch users from database
try {
    $stmt = $pdo->query("SELECT ID, memberName, contNumb, contDesc FROM contributions");
    $users = $stmt->fetchAll();
} catch (Exception $e) {
    echo "Query failed: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About our smart city infrastructure company">
    <meta name="keywords" content="City, Smart, Technology, Infrastructure, Future, Building, Development, Mission">
    <meta name="author" content="106524661, Cammie/Yianni">
    <title>About Horizron Industries</title>
    <link rel="stylesheet" href="styles/styles.css">
        <style>
            #Page {
                display: flex;
                flex-direction: column;
                flex-wrap: nowrap;
                justify-content: space-evenly;
                align-items: center;
                align-content: center;
                border: 6px solid rgb(255, 176, 40);
            }

            #Details {
                display: flex; /* Makes the page container a flexbox */
                padding: 1em;
                background-color: rgb(255, 243, 198);
                align-items: right;
                text-align: space-between;
                border: 6px solid rgb(255, 176, 40);
                border-radius: 15px; /* Curves the edges of the page */
                flex-direction: row;
                flex-wrap: nowrap;
                justify-content: space-between;
                align-content: normal;
            }

            fieldset {
                border-color: rgb(255, 176, 40);
            }

            img {
                max-width: 70%;
                height: auto;
            }
            
            nav a {
                border: 4px solid rgb(110, 159, 202);
                transition: 0.12s ease-in all;
            }

            nav a:hover {
                transform:translateY(-0.1em);
                border: 4px solid rgb(67, 109, 145);
            }

            table {
                width: 80%;
                border-radius: 7px;
                border-collapse: collapse;
                padding: 10px 10px;
                overflow: hidden;
            }


	        th {
                background-color: rgb(207, 232, 255);
	            color: rgb(67, 109, 145);
	            border: 3px solid rgb(110, 159, 202);
	            padding: 10px 10px;
	            border-radius: 7px;
            }

            td {
                border: 3px solid #D9B8E5;
                padding: 10px 10px;
            }

            tr {
                background-color: #E9D6F0;
                color: #AF66CC;
                padding: 10px 10px;
            }
            
            td:hover {
         	background-color: #D9B8E5;
            	color: #9F46C3;
        	border: 3px solid #C38DD8;
            }


            #painting {
                width: 400px;
                height: auto;
            }

            #container {
                display: flex; /* Makes the page container a flexbox */
                flex-direction: column;
                justify-content: space-evenly;
                text-align: center;
                align-items: center;
                padding: 1em;
                background-color: rgb(255, 243, 198);
                border: 6px solid rgb(255, 176, 40);
                border-radius: 15px; /* Curves the edges of the page */
            }
        </style>
</head> 
<body>
<div id="Page">
    <header>
        <h1>Who are we?</h1>
    </header>
</div>
    <?php include 'nav.inc'; ?>
    <section>
        <div id="Details" style="flex-flow: column;">
        <h2>About us</h2>
            <p>
                At Horizron Industries, we strive to be the gold standard for Smart City Infrastructure, offering consulting services with various specialties in software development, tech solutions and digital platforms in:
            </p>
            <p>
                <ul>
                    <li>Smart Transport</li>
                    <li>Energy Monitoring</li>
                    <li>Urban Services Management</li>
                </ul>
            </p>
        </div>
    </section>

    <div style="height: 40px;"></div>

    <section>
        <div id="Page">
        <h2>Meet our group (TYD)</h2>
            <p></p>
            <figure>
                <img id="groupphoto" src="images/group.png" alt="A group photo showcasing Daniel, Yianni and Tanadol">
                <figcaption>Meet Daniel, Yianni and Tanadol! Hoang went on vacation and couldn't make it :c</figcaption>
            </figure>
        </div>
    </section>

    <div style="height: 40px;"></div>

    <section>
        <div id="Details" style="flex-flow: column;">
        <h2>More about us</h2>
            <h3>Positions and personal quotes:</h3>
                <dl>
                    <dt>Daniel Colgroove: Backened developer and Product director</dt>
                    <dd>"Finché c'è vita c'è speranza" -> (While there's life, there's hope)</dd>
<div style="height: 30px;"></div>
                    <dt>Cammie/Yianni Charalambous: Frontend developer and Customer support agent</dt>
                    <!--credit https://www.greekpod101.com/blog/2021/03/04/greek-quotes/-->
                    <dd>"Έχω αποτύχει ξανά και ξανά και ξανά στη ζωή μου και αυτός είναι ο λόγος που πετυχαίνω." -> (I’ve failed over and over and over again in my life and that is why I succeed)</dd>
<div style="height: 30px;"></div>
                    <dt>Tanadol Baibong: Backend developer and Interviewer</dt>
                    <dd>"มีแต่ทำ กับไม่ทำ ไม่มีคำว่าลอง" -> (Do, or do not. There is no “try”)</dd>
<div style="height: 30px;"></div>
                    <dt>Hoang Khang Vo: Applications manager</dt>
                    <!--credit https://www.deepl.com/en/translator-->
                    <dd>"Hej, världen!" -> (Hello world!)</dd>
                </dl>
        </div>
    </section>

<div style="height: 40px;"></div>

    <section>
        <div id="Details" style="flex-flow: column;">
        <h2>Contacts and Availability</h2>
            <p>You can find us in Swinburne University's Hawthorn Campus in the Business Arts building in room BA603, or, you may send us a direct inquiry via our email</p>
            <ul>
                <li>Contact Hours:
                    <ul>
                        <li>Monday: <time>12:30</time> to <time>13:30</time></li>
                        <li>Friday: <time>10:30</time> to <time>12:30</time></li>
                    </ul>
                </li>
            </ul>
        </div>
    </section>

<div style="height: 40px;"></div>

    <section>
        <div id="Details" style="flex-flow: column;">
        <h2>Fun facts!</h2>
                <li>Daniel:
                    <ul>
                        <li>My dream job is to become a Game developer. My favourite snack is a whole carrot. My Hometown is Wodonga VIC. I own 4 cats back home, My mum is a radio presenter</li>
                    </ul>
                </li>
                <li>Cammie/Yianni:
                    <ul>
                        <li>My dream job is to become a Cybersecurity Consultant. My favourite snacks are wafer crackers. My hometown is Mount Waverley VIC. I like keyboards and I own 2 cats</li>
                    </ul>
                </li>
                <li>Tanadol:
                    <ul>
                        <li>My dream job is to become a Cybersecurity Engineer. My Hometown is Bangkok. Thailand. I love staying up late</li>
                    </ul>
                </li>
                <li>Hoang:
                    <ul>
                        <li>N/A</li>
                    </ul>
                </li>
        </div>
    </section>

    <div style="height: 80px;"></div>

    <section>
        <div id="Page" style="flex-flow: column;">
        <h2>Privacy Statement</h2>
        <p>At Horizron Industries, we collect information such as contact details (email, phone number), payment information and location details in order to provide our services. We reserve the right to store this information until our services are completed, cancelled, closed, after account deletion or upon user request, where all data (or requested data) will be promptly deleted.</p>
       </div>
    </section>

<div style="height: 40px;"></div>

<div id="container">
    <section>
        <div>
            <h1>Acknowledgement of Country and respecting Aboriginal and Torres Strait Islander peoples as the original owners of the land</h1>
                <p>Horizron Industries acknowledges all Aboriginal, Torres Strait Islander and Wurundjeri People of the Kulin Nation as the traditional owners of the land, on which our offices are located, and recognises their continuing connection to land, sea, culture and community. We pay our respects to Elders past, present and emerging.</p>
        </div>
        <div>
            <figure>
                    <!--credit https://www.flickr.com/photos/cogdog/1633371567-->
                    <img id="painting" src="images/painting.jpg" alt="Painting">
                <figcaption></figcaption>
            </figure>
        </div>
    </div>
    </section>

    <div style="height: 80px;"></div>
	
<section>
    <div id="Page">
        <?php if (!empty($users)): ?>
        <table>
            <thead>
                <tr>
                    <th>Record ID</th>
                    <th>Member Name</th>
                    <th>Contribution Number</th>
                    <th>Contribution Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['ID']); ?></td>
                        <td><?php echo htmlspecialchars($user['memberName']); ?></td>
                        <td><?php echo htmlspecialchars($user['contNumb']); ?></td>
                        <td><?php echo htmlspecialchars($user['contDesc']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No records found in the system database.</p>
    <?php endif; ?>
    </div>
</section>
    <?php include 'footer.inc'; ?>
</body>
</html>