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

            .error {
                display: inline-flex;
                color: rgb(255,0,0);
                font-size: 0.9em;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <?php 
        session_start(); 
        ?>
        <header>
            <h1>Application page</h1>
        </header>
        <?php include 'nav.inc'; ?> <!-- Navagation menu that links to the other pages and darkens when you hover over them -->
        <?php 
            $errors = $_SESSION['errors'] ?? [];
            $backup = $_SESSION['backup'] ?? []; // An array of all the submitted values when the submit button is pressed
        ?>
        <div id="Page" style="align-self: center; width: clamp(450px, 60vw, 800px);"> <!-- The clamp function allows you to set a minimum, preferred and maximum size, scaling between these values but never going past them. I wanted the form to take up roughly 60% of the screen so it looks like a physical application form while not ending up squishing to an extreme size when viewed on smaller screens, so I set a minimum limit that it will not get smaller than so as to keep it usable and legible -->
            <form method="POST" action="process_eoi.php"> <!-- Sends all the data from the form to process_eoi.php -->
                <div>
                    <label for="JRN">Job reference number</label> 
                    <input type="text" name="JRN" id="JRN" placeholder="e.g. 'XE443'" value="<?php echo $backup['JRN'] ?? ''; ?>"> <!-- Sets the value to whatever was put into this field when the submit button was pressed -->
                    <?php 
                    if (!empty($errors['jrn'] ?? '')) { // If there's something stored in $errors['index'] print it out next to the field it applies to
                        echo "<p class='error'>{$errors['jrn']}</p>";
                    }
                    ?>
                </div>
                <fieldset>
                    <legend>Your name</legend>
                    <div>
                        <label for="Fname">First name</label> 
                        <input type="text" name="Fname" id="Fname" value="<?php echo $backup['Fname'] ?? ''; ?>"> <!-- Sets the value to whatever was put into this field when the submit button was pressed -->
                        <?php 
                        if (!empty($errors['fname'] ?? '')) { // If there's something stored in $errors['index'] print it out next to the field it applies to
                            echo "<p class='error'>{$errors['fname']}</p>";
                        }
                        ?>
                    </div>
                    <div>
                        <label for="Lname">Last name</label>
                        <input type="text" name="Lname" id="Lname" value="<?php echo $backup['Lname'] ?? ''; ?>"> <!-- Sets the value to whatever was put into this field when the submit button was pressed -->
                        <?php 
                        if (!empty($errors['lname'] ?? '')) { // If there's something stored in $errors['index'] print it out next to the field it applies to
                            echo "<p class='error'>{$errors['lname']}</p>";
                        }
                        ?>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Other information</legend>
                    <div>
                        <label for="DOB">Date of birth</label> 
                        <input type="text" name="DOB" id="DOB" placeholder="dd/mm/yyyy" value="<?php echo $backup['DOB'] ?? ''; ?>"> <!-- Sets the value to whatever was put into this field when the submit button was pressed -->
                        <?php 
                        if (!empty($errors['dob'] ?? '')) { // If there's something stored in $errors['index'] print it out next to the field it applies to
                            echo "<p class='error'>{$errors['dob']}</p>";
                        }
                        ?>
                        <fieldset>
                            <legend>Gender</legend>
                                <?php 
                                if (!empty($errors['gender'] ?? '')) { // If there's something stored in $errors['index'] print it out next to the field it applies to
                                    echo "<p class='error'>{$errors['gender']}</p>";
                                }
                                ?>
                                <div class="align">
                                    <input type="radio" name="Gender" id="Male" value="Male" <?php echo (($backup['Gender'] ?? '') == 'Male') ? 'checked' : ''; ?>> <!-- Checks to see what the previous selection was and sets it as checked if they match -->
                                    <label class="radio" for="Male">Male</label> 
                                </div>
                                <div class="align">
                                    <input type="radio" name="Gender" id="Female" value="Female" <?php echo (($backup['Gender'] ?? '') == 'Female') ? 'checked' : ''; ?>>
                                    <label class="radio" for="Female">Female</label> 
                                </div>
                                <div class="align">
                                    <input type="radio" name="Gender" id="Other" value="Other" <?php echo (($backup['Gender'] ?? '') == 'Other') ? 'checked' : ''; ?>>
                                    <label class="radio" for="Other">Other</label> 
                                </div>
                        </fieldset>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Address</legend>
                    <div>	
                        <label for="Address">Street Address</label> 
                        <input type="text" name="Address" id="Address" placeholder="*123 Smith St" value="<?php echo $backup['Address'] ?? ''; ?>"> <!-- Sets the value to whatever was put into this field when the submit button was pressed -->
                        <?php 
                        if (!empty($errors['address'] ?? '')) { // If there's something stored in $errors['index'] print it out next to the field it applies to
                            echo "<p class='error'>{$errors['address']}</p>";
                        }
                        ?> 
                    </div>
                    <div>
                        <label for="Town">Suburb/Town</label>
                        <input type="text" name="Town" id="Town" placeholder="*Melbourne" value="<?php echo $backup['Town'] ?? ''; ?>"> <!-- Sets the value to whatever was put into this field when the submit button was pressed -->
                        <?php 
                        if (!empty($errors['town'] ?? '')) { // If there's something stored in $errors['index'] print it out next to the field it applies to
                            echo "<p class='error'>{$errors['town']}</p>";
                        }
                        ?> 
                    </div>
                    <div>
                        <label for="State">State</label> 
                        <select name="State" id="State">
                            <option value="">Please Select</option>			
                            <option value="VIC" <?php echo (($backup['State'] ?? '') == 'VIC') ? 'selected' : ''; ?>>VIC</option> <!-- Checks to see what the previous state selected was and sets it as selected if they match -->
                            <option value="NSW" <?php echo (($backup['State'] ?? '') == 'NSW') ? 'selected' : ''; ?>>NSW</option>
                            <option value="QLD" <?php echo (($backup['State'] ?? '') == 'QLD') ? 'selected' : ''; ?>>QLD</option>
                            <option value="NT" <?php echo (($backup['State'] ?? '') == 'NT') ? 'selected' : ''; ?>>NT</option>
                            <option value="WA" <?php echo (($backup['State'] ?? '') == 'WA') ? 'selected' : ''; ?>>WA</option>
                            <option value="SA" <?php echo (($backup['State'] ?? '') == 'SA') ? 'selected' : ''; ?>>SA</option>
                            <option value="TAS" <?php echo (($backup['State'] ?? '') == 'TAS') ? 'selected' : ''; ?>>TAS</option>
                            <option value="ACT" <?php echo (($backup['State'] ?? '') == 'ACT') ? 'selected' : ''; ?>>ACT</option>
                        </select>
                        <?php 
                        if (!empty($errors['state'] ?? '')) { // If there's something stored in $errors['index'] print it out next to the field it applies to
                            echo "<p class='error'>{$errors['state']}</p>";
                        }
                        ?>
                    </div>
                    <div>
                        <label for="Postcode">Postcode</label> 
                        <input type="text" name="Postcode" id="Postcode" placeholder="*1111" value="<?php echo $backup['Postcode'] ?? ''; ?>"> <!-- Sets the value to whatever was put into this field when the submit button was pressed -->
                        <?php 
                        if (!empty($errors['postcode'] ?? '')) { // If there's something stored in $errors['index'] print it out next to the field it applies to
                            echo "<p class='error'>{$errors['postcode']}</p>";
                        }
                        ?>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Contacts</legend>
                    <div>
                        <label for="Email">Email</label> 
                        <input type="text" name="Email" id="Email" placeholder="*JohnSmith@gmail.com" value="<?php echo $backup['Email'] ?? ''; ?>"> <!-- Sets the value to whatever was put into this field when the submit button was pressed -->
                        <?php 
                        if (!empty($errors['email'] ?? '')) { // If there's something stored in $errors['index'] print it out next to the field it applies to
                            echo "<p class='error'>{$errors['email']}</p>";
                        }
                        ?>
                    </div>
                    <div>
                        <label for="Number">Phone number</label> 
                        <input type="text" name="Number" id="Number" placeholder="*0423456789" value="<?php echo $backup['Number'] ?? ''; ?>"> <!-- Sets the value to whatever was put into this field when the submit button was pressed -->
                        <?php 
                        if (!empty($errors['number'] ?? '')) { // If there's something stored in $errors['index'] print it out next to the field it applies to
                            echo "<p class='error'>{$errors['number']}</p>";
                        }
                        ?>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Skills</legend> <!-- The [] after the name "Skill" allows for multiple values to be submitted in an array. if it wasn't there, the form would only submit the first listed selected answer -->
                    <?php 
                        if (!empty($errors['skills'] ?? '')) { // If there's something stored in $errors['index'] print it out next to the field it applies to
                            echo "<p class='error'>{$errors['skills']}</p>";
                        }
                        $backupSkills = isset($backup['Skill']) && $backup['Skill'] !== '' ? explode(", ", $backup['Skill']) : []; // If the Skill backup is set and isn't empty, then it converts the string back into an array, removing the commas and spaces
                        ?>
                    <div class="align">
                        <input type="checkbox" id="Elec/Pow" name="Skill[]" value="Elec/Pow" <?php echo in_array("Elec/Pow", $backupSkills) ? 'checked' : ''; ?>> <!-- Checks if a certain value is in the backup array and if it is sets the box as checked -->
                        <label class="checkbox" for="Elec/Pow">Degree in Electrical Engineering or Power Systems</label>
                    </div>
                    <div class="align">
                        <input type="checkbox" id="5+Pow" name="Skill[]" value="5+Pow" <?php echo in_array("5+Pow", $backupSkills) ? 'checked' : ''; ?>>
                        <label class="checkbox" for="5+Pow">5+ years in power systems design</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="SCADA" name="Skill[]" value="SCADA" <?php echo in_array("SCADA", $backupSkills) ? 'checked' : ''; ?>>
                        <label class="checkbox" for="SCADA">Expertise in SCADA systems</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="IEEE" name="Skill[]" value="IEEE" <?php echo in_array("IEEE", $backupSkills) ? 'checked' : ''; ?>>
                        <label class="checkbox" for="IEEE">Experience with IEEE 2030.5 standards</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="BESS" name="Skill[]" value="BESS" <?php echo in_array("BESS", $backupSkills) ? 'checked' : ''; ?>>
                        <label class="checkbox" for="BESS">BESS (Battery Energy Storage) experience</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="Proj/Bus/IT" name="Skill[]" value="Proj/Bus/IT" <?php echo in_array("Proj/Bus/IT", $backupSkills) ? 'checked' : ''; ?>>
                        <label class="checkbox" for="Proj/Bus/IT">Degree in Project Management, Business, or IT</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="3+Inf/Tech" name="Skill[]" value="3+Inf/Tech" <?php echo in_array("3+Inf/Tech", $backupSkills) ? 'checked' : ''; ?>>
                        <label class="checkbox" for="3+Inf/Tech">3+ years experience in infrastructure or technology projects</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="PMBOK/PRINCE2" name="Skill[]" value="PMBOK/PRINCE2" <?php echo in_array("PMBOK/PRINCE2", $backupSkills) ? 'checked' : ''; ?>>
                        <label class="checkbox" for="PMBOK/PRINCE2">PMBOK or PRINCE2 certification</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="GovPro" name="Skill[]" value="GovPro" <?php echo in_array("GovPro", $backupSkills) ? 'checked' : ''; ?>>
                        <label class="checkbox" for="GovPro">Experience working with Australian local government procurement</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="IoT" name="Skill[]" value="IoT" <?php echo in_array("IoT", $backupSkills) ? 'checked' : ''; ?>>
                        <label class="checkbox" for="IoT">Background in IoT or smart city technologies</label> 
                    </div>
                    <div class="align">
                        <input type="checkbox" id="ContNeg" name="Skill[]" value="ContNeg" <?php echo in_array("ContNeg", $backupSkills) ? 'checked' : ''; ?>>
                        <label class="checkbox" for="ContNeg">Strong contract negotiation skills</label> 
                    </div>
                    <div>
                        <label for="OtherSkills">Other Skills<br></label>
                        <textarea style="border-radius: 5px;" id="OtherSkills" placeholder="Not required" name="OtherSkills" rows="5" cols="34"><?php echo $backup['OtherSkills'] ?? ''; ?></textarea>
                    </div>
                </fieldset>
                <input class="button" type="submit" value="Apply">
                <input class="button" type="reset" value="Reset Form">
            </form>
            <?php 
            unset($_SESSION['errors'], $_SESSION['backup']); // Clears everything in $_SESSION['errors'] and $_SESSION['backup'] so that it can be used next time the apply button is pressed
            ?>
        </div>
        <?php include 'footer.inc'; ?>
    </body>
</html>