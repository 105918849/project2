<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="description" content="The application page for Horizon Industries' job application site">
    <meta name="keywords" content="application, jobs, apply, work, Horizon Industries">
    <meta name="author" content="Daniel Colegrove">
    <title>Apply Now!</title>
    <link rel="stylesheet" href="styles/styles.css">
        <style>
            #Page {
                display: flex;
                flex-direction: column;
                flex-wrap: nowrap;
                justify-content: space-evenly;
                align-items: stretch;
                align-content: normal;
            }

            fieldset {
                border-color: rgb(255, 176, 40);
            }

            div {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Application page</h1>
        </header>
        <?php include 'nav.inc'; ?>
        <div id="Page" style="justify-self: center; width: clamp(450px, 60vw, 800px);">
            <form method="post" action="https://mercury.swin.edu.au/it000000/formtest.php">
                <div>
                    <label for="JRN">Job reference number</label> 
                    <input type="text" name="JRN" id="JRN" pattern="^[0-9a-zA-Z]{5}" required="required">
                </div>
                <fieldset>
                    <legend>Your name</legend>
                    <div>
                        <label for="Fname">First name</label> 
                        <input type="text" name="Fname" id="Fname" pattern="^[a-zA-Z]{1,20}" required="required">
                    </div>
                    <div>
                        <label for="Lname">Last name</label>
                        <input type="text" name="Lname" id="Lname" pattern="^[a-zA-Z]{1,20}" required="required">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Other information</legend>
                    <div>
                        <label for="DOB">Date of birth</label> 
                        <input type="text" name="DOB" id="DOB" placeholder="dd/mm/yyyy" pattern="([012]?[0-9]|3[0-1])/(0?[1-9]|1[0-2])/[0-9][0-9][0-9][0-9]" required="required">
                        <fieldset>
                            <legend>Gender</legend>
                                <label for="Male">Male</label> 
                                <input type="radio" name="Gender" id="Male" value="Male" required="required">
                                <label for="Female">Female</label> 
                                <input type="radio" name="Gender" id="Female" value="Female">
                                <label for="Other">Other</label> 
                                <input type="radio" name="Gender" id="Other" value="Other">
                        </fieldset>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Address</legend>
                    <div>	
                        <label for="Address">Street Address</label> 
                        <input type="text" name="Address" id="Address" pattern="^{1,40}" required="required">
                    </div>
                    <div>
                        <label for="Town">Suburb/Town</label>
                        <input type="text" name="Town" id="Town" pattern="^{1,40}" required="required">
                    </div>
                    <div>
                        <label for="State">State</label> 
                        <select name="State" id="State" required="required">
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
                        <input type="text" name="Postcode" id="Postcode" pattern="^[0-9]{4}" required="required">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Contacts</legend>
                    <div>
                        <label for="Email">Email</label> 
                        <input type="text" name="Email" id="Email" pattern="^[a-zA-Z0-9]+@[a-zA-Z0-9.]+\.[a-z]{2,4}" required="required">
                    </div>
                    <div>
                        <label for="Number">Phone number</label> 
                        <input type="text" name="Number" id="Number" pattern="^[0-9]{8,12}" required="required">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Skills</legend>
                    <div>
                        <label for="Elec/Pow">Degree in Electrical Engineering or Power Systems</label>
                        <input type="checkbox" id="Elec/Pow" name="Skill[]" value="Elec/Pow">
                    </div>
                    <div>
                        <label for="5+Pow">5+ years in power systems design</label> 
                        <input type="checkbox" id="5+Pow" name="Skill[]" value="5+Pow">
                    </div>
                    <div>
                        <label for="SCADA">Expertise in SCADA systems</label> 
                        <input type="checkbox" id="SCADA" name="Skill[]" value="SCADA">
                    </div>
                    <div>
                        <label for="IEEE">Experience with IEEE 2030.5 standards</label> 
                        <input type="checkbox" id="IEEE" name="Skill[]" value="IEEE">
                    </div>
                    <div>
                        <label for="BESS">BESS (Battery Energy Storage) experience</label> 
                        <input type="checkbox" id="BESS" name="Skill[]" value="BESS">
                    </div>
                    <div>
                        <label for="Proj/Bus/IT">Degree in Project Management, Business, or IT</label> 
                        <input type="checkbox" id="Proj/Bus/IT" name="Skill[]" value="Proj/Bus/IT">
                    </div>
                    <div>
                        <label for="3+Inf/Tech">3+ years experience in infrastructure or technology projects</label> 
                        <input type="checkbox" id="3+Inf/Tech" name="Skill[]" value="3+Inf/Tech" required="required">
                    </div>
                    <div>
                        <label for="PMBOK/PRINCE2">PMBOK or PRINCE2 certification</label> 
                        <input type="checkbox" id="PMBOK/PRINCE2" name="Skill[]" value="PMBOK/PRINCE2">
                    </div>
                    <div>
                        <label for="GovPro">Experience working with Australian local government procurement</label> 
                        <input type="checkbox" id="GovPro" name="Skill[]" value="GovPro">
                    </div>
                    <div>
                        <label for="IoT">Background in IoT or smart city technologies</label> 
                        <input type="checkbox" id="IoT" name="Skill[]" value="IoT">
                    </div>
                    <div>
                        <label for="ContNeg">Strong contract negotiation skills</label> 
                        <input type="checkbox" id="ContNeg" name="Skill[]" value="ContNeg">
                    </div>
                    <div>
                        <label for="OtherSkills">Other Skills<br></label>
                        <textarea id="OtherSkills" name="OtherSkills" rows="5" cols="40"></textarea>
                    </div>
                </fieldset>
                <input type="submit" value="Apply">
                <input type="reset" value="Reset Form">
            </form>
        </div>
        <?php include 'footer.inc'; ?>
    </body>
</html>