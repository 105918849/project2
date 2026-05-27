<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The application page for Horizon Industries' job application site">
    <meta name="keywords" content="application, jobs, apply, work, Horizon Industries">
    <meta name="author" content="Daniel Colegrove">
    <title>Apply Now!</title>
    <link rel="stylesheet" href="styles/styles.css">
        <style>
            #Page {
                flex-direction: column;
                align-items: stretch;
            }

            fieldset {
                border-color: rgb(255, 176, 40);
                margin: 1em;
            }

            form div {
                padding: 10px;
            }

            .button {
                display: inline flex;
                font-size: 0.8em;
                background-color: rgb(255, 255, 255);
                padding: 1em;
                border-radius: 10px; /* Curves the edges of the buttons */
                margin: 20px;
                color: rgb(0, 0, 0);
                font-weight: bold;
            }

            input[type="text"] { /* Targets all text inputs */
                border-radius: 50px; /* Curves the ends of the textbox */
                font-size: 1em;
            }

            input[type="radio"], input[type="checkbox"] { /* Targets all radio inputs and labels as well as all checkbox inputs and labels */
                width: 30px;
                height: 30px;
                cursor: pointer; /* sets the cursor to a pointer when hovered */
            }

            .radio, .checkbox {
                cursor: pointer; /* sets the cursor to a pointer when hovered */
            }

            .align {
                display: flex;
                flex-direction: row;
                flex-wrap: nowrap;
                justify-content: flex-start;
                align-items: center;
                align-content: center;
            }

            .align .checkbox {
                flex-grow: 1; /* Fills the remaining space on the line */
            }

            .button:hover { /* Darkens the button when hovered over and sets the cursor to a pointer */
                background-color: rgb(220, 220, 220);
                cursor: pointer;
            }

            legend {
                font-weight: bold;
                font-size: 1.2em;
                padding: 0.5em;
            }

            select, textarea {
                font-size: 1em;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Application page</h1>
        </header>
        <?php include 'nav.inc'; ?> <!-- Navagation menu that links to the other pages and darkens when you hover over them -->
        <div id="Page" style="align-self: center; width: clamp(450px, 60vw, 800px);"> <!-- The clamp function allows you to set a minimum, preferred and maximum size, scaling between these values but never going past them. I wanted the form to take up roughly 60% of the screen so it looks like a physical application form while not ending up squishing to an extreme size when viewed on smaller screens, so I set a minimum limit that it will not get smaller than so as to keep it usable and legible -->
            <form method="post" action="https://mercury.swin.edu.au/it000000/formtest.php"> <!-- -->
                <div>
                    <label for="JRN">Job reference number</label> 
                    <input type="text" name="JRN" id="JRN" placeholder="e.g. 'XE443'" pattern="^[0-9a-zA-Z]{5}$" required="required"> <!-- Pattern only allows 5 Alphanumeric digits -->
                </div>
                <fieldset>
                    <legend>Your name</legend>
                    <div>
                        <label for="Fname">First name</label> 
                        <input type="text" name="Fname" id="Fname" pattern="^[a-zA-Z]{1,20}$" required="required"> <!-- Pattern only accepts an input of Alphabet characters between the amount of 1 and 20 -->
                    </div>
                    <div>
                        <label for="Lname">Last name</label>
                        <input type="text" name="Lname" id="Lname" pattern="^[a-zA-Z]{1,20}$" required="required"> <!-- Pattern only accepts an input of Alphabet characters between the amount of 1 and 20 -->
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Other information</legend>
                    <div>
                        <label for="DOB">Date of birth</label> 
                        <input type="text" name="DOB" id="DOB" placeholder="dd/mm/yyyy" pattern="^([012]?[0-9]|3[0-1])/(0?[1-9]|1[0-2])/[0-9][0-9][0-9][0-9]$" required="required"> <!-- Pattern only allows 1 to 31 in the days category, 1 to 12 in the months category, and any four digit number from 0000 to 9999 in the years category -->
                        <fieldset>
                            <legend>Gender</legend>
                                <div class="align">
                                    <input type="radio" name="Gender" id="Male" value="Male" required="required"> <!-- Must select one -->
                                    <label class="radio" for="Male">Male</label> 
                                </div>
                                <div class="align">
                                    <input type="radio" name="Gender" id="Female" value="Female">
                                    <label class="radio" for="Female">Female</label> 
                                </div>
                                <div class="align">
                                    <input type="radio" name="Gender" id="Other" value="Other">
                                    <label class="radio" for="Other">Other</label> 
                                </div>
                        </fieldset>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Address</legend>
                    <div>	
                        <label for="Address">Street Address</label> 
                        <input type="text" name="Address" id="Address" placeholder="*123 Smith St" pattern="^.{1,40}$" required="required"> <!-- Pattern takes any input as long as it is between 1 and 40 characters long -->
                    </div>
                    <div>
                        <label for="Town">Suburb/Town</label>
                        <input type="text" name="Town" id="Town" placeholder="*Melbourne" pattern="^.{1,40}$" required="required"> <!-- Pattern takes any input as long as it is between 1 and 40 characters long -->
                    </div>
                    <div>
                        <label for="State">State</label> 
                        <select name="State" id="State" required="required"> <!-- Since the first option has no given value, it can not be submitted, making it required to select a different option -->
                            <option value="">Please Select</option>			
                            <option value="VIC">VIC</option>			
                            <option value="NSW">NSW</option>
                            <option value="QLD">QLD</option>
                            <option value="NT">NT</option>
                            <option value="WA">WA</option>
                            <option value="SA">SA</option>
                            <option value="TAS">TAS</option>
                            <option value="ACT">ACT</option>
                        </select>
                    </div>
                    <div>
                        <label for="Postcode">Postcode</label> 
                        <input type="text" name="Postcode" id="Postcode" placeholder="*1111" pattern="^[0-9]{4}$" required="required"> <!-- Pattern only accepts a string of four numbers -->
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Contacts</legend>
                    <div>
                        <label for="Email">Email</label> 
                        <input type="text" name="Email" id="Email" placeholder="*JohnSmith@gmail.com" pattern="^[a-zA-Z0-9]+@[a-zA-Z0-9.]+\.[a-z]{2,4}$" required="required"> <!-- Pattern only accepts valid email formats, checking for an @ and allowing for as many .s as are required as long as it is followed by between 2 and 4 letters -->
                    </div>
                    <div>
                        <label for="Number">Phone number</label> 
                        <input type="text" name="Number" id="Number" placeholder="*0423456789" pattern="^[0-9]{8,12}$" required="required"> <!-- Pattern only accepts a string of between 8 and 12 numerical characters -->
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Skills</legend> <!-- The [] after the name "Skill" allows for multiple values to be submitted, because if it wasn't there, the form would only submit the first listed selected answer -->
                    <div class="align">
                        <input type="checkbox" id="Elec/Pow" name="Skill[]" value="Elec/Pow">
                        <label class="checkbox" for="Elec/Pow">Degree in Electrical Engineering or Power Systems</label>
                    </div>
                    <div class="align">
                        <input type="checkbox" id="5+Pow" name="Skill[]" value="5+Pow">
                        <label class="checkbox" for="5+Pow">5+ years in power systems design</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="SCADA" name="Skill[]" value="SCADA">
                        <label class="checkbox" for="SCADA">Expertise in SCADA systems</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="IEEE" name="Skill[]" value="IEEE">
                        <label class="checkbox" for="IEEE">Experience with IEEE 2030.5 standards</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="BESS" name="Skill[]" value="BESS">
                        <label class="checkbox" for="BESS">BESS (Battery Energy Storage) experience</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="Proj/Bus/IT" name="Skill[]" value="Proj/Bus/IT">
                        <label class="checkbox" for="Proj/Bus/IT">Degree in Project Management, Business, or IT</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="3+Inf/Tech" name="Skill[]" value="3+Inf/Tech" required="required">
                        <label class="checkbox" for="3+Inf/Tech">3+ years experience in infrastructure or technology projects</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="PMBOK/PRINCE2" name="Skill[]" value="PMBOK/PRINCE2">
                        <label class="checkbox" for="PMBOK/PRINCE2">PMBOK or PRINCE2 certification</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="GovPro" name="Skill[]" value="GovPro">
                        <label class="checkbox" for="GovPro">Experience working with Australian local government procurement</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="IoT" name="Skill[]" value="IoT">
                        <label class="checkbox" for="IoT">Background in IoT or smart city technologies</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="ContNeg" name="Skill[]" value="ContNeg">
                        <label class="checkbox" for="ContNeg">Strong contract negotiation skills</label> 
                    </div>
                    <div>
                        <label for="OtherSkills">Other Skills<br></label>
                        <textarea style="border-radius: 5px;" id="OtherSkills" name="OtherSkills" rows="5" cols="34"></textarea>
                    </div>
                </fieldset>
                <input class="button" type="submit" value="Apply">
                <input class="button" type="reset" value="Reset Form">
            </form>
        </div>
        <?php include 'footer.inc'; ?>
    </body>
</html>