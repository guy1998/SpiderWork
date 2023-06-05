<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpiderWork</title>
    <link rel="stylesheet" type="text/css" href="../styles/log-in.css">
</head>
<body>
    <h2 id="slogan" class="">Weave your future with the best weavers</h2>
    <h4 id="contactEmail" class="">spiders@gmail.com</h4>
    <h4 id="contactNumber" class="">+355 67 68 69 070</h4>
    <ul id="socials" class="">
        <li><img src="../images/facebook.png" onclick="" width="20px" height="20px"></li>
        <li><img src="../images/linkedin.png" onclick="" width="20px" height="20px"></li>
        <li><img src="../images/twitter.png" onclick="" width="20px" height="20px"></li>
        <li><img src="../images/instagram.png" onclick="" width="20px" height="20px"></li>
    </ul>
    <form id="login" method="POST" action="../controller/loginControl.php" class ="">
        <h1>SpiderWork</h1>
        <input type="text" required placeholder="username" name="username"><br>
        <input type = "password" required placeholder="password" name="password"><br>
        <input type="submit" id="submitButton" value="Log-In" autofocus>
    </form>
    <button id="directSign" onclick="activateSignUp()">Sign-Up</button>
    <div id="wait" class="waiting">
        <h1 id="prompt">Make your first move here</h1>
        <h2 id="choice">You're seeking to:</h2>
        <ul id="types">

            <li onclick="activateWorkerForm()">WORK</li>
            <div id="formWorker">
                <form method="POST" onsubmit="" action="../controller/user.php" enctype="multipart/form-data">
                    <h3>General information:</h3>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name ='name' required><br>
                    </div>
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" name="surname" required><br>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" name="email" required><br>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name ='phone' required>
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="date" name ='birthday' required>
                    </div>
                    <div class="form-group">
                        <label>Work field</label>
                        <input type="text" name ='field' required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name ='username' required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name ='password' required>
                    </div>
                    <h3>Professional experience:</h3>
                    <div id="readField">
                        <h4>Employer</h4>
                        <div class="form-group">
                            <label>Employer's name</label>
                            <input type="text" name ='empName' required>
                        </div>
                        <div class="form-group">
                            <label>Years</label>
                            <input type="number" name ='years' required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="jobDesc"></textarea>
                        </div>
                    </div>
                    <h3>Education:</h3>
                    <div id="readField2">
                        <h4>School</h4>
                        <div class="form-group">
                            <label>School's name</label>
                            <input type="text" name ='school' required>
                        </div>
                        <div class="form-group">
                            <label>Degree</label>
                            <input type="text" name ='degree' required>
                        </div>
                    </div>
                    <input type="submit" name="signUp1" id="signUp1" value="Sign-Up" class="add-buttons">
                </form>
            </div>

            <li onclick="activateEmployeeForm()">EMPLOY</li>
            <div id="formEmp">
            <form method="post" action="../controller/empSignUp.php">
                <h3>General information:</h3>
                <div class="form-group">
                    <label>Company's name</label>
                    <input type="text" name ='Coname' required><br>
                </div>
                <div class="form-group">
                    <label>Owner's name</label>
                    <input type="text" name="Oname" required><br>
                </div>
                <div class="form-group">
                    <label>Owner's surname</label>
                    <input type="text" name="Osurname" required><br>
                </div>
                <div class="form-group">
                    <label>Contact's name</label>
                    <input type="text" name="Contactname" required><br>
                </div>
                <div class="form-group">
                    <label>Contact's surname</label>
                    <input type="text" name="Contactsurname" required><br>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" name="email" required><br>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name ='phone' required>
                </div>
                <div class="form-group">
                    <label>Founding date</label>
                    <input type="date" name ='fd' required>
                </div>
                <div class="form-group">
                    <label>Work field</label>
                    <input type="text" name ='field' required>
                </div>
                <h3>Account credentials</h3>
                <div class="form-group">
                        <label>Username</label>
                        <input type="text" name ='username' required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name ='password' required>
                    </div>
                <input type="submit" name="signUp2" id="signUp2" value="Sign-Up" class="add-buttons">
            </form>
            </div>

            <li onclick="activateReqForm()">CONNECT</li>
            <div id="formReq">
                <form method="post" action="../controller/reqSignUp.php">
                <h3>General information:</h3>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name ='name' required><br>
                    </div>
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" name="surname" required><br>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" name="email" required><br>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name ='phone' required>
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="date" name ='birthday' required>
                    </div>
                    <h3>Account credentials:</h3>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name ='username' required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name ='password' required>
                    </div>
                    <h3>Professional information:</h3>
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" name ='website'>
                    </div>
                    <input type="submit" name="signUp3" id="signUp3" value="Sign-Up" class="add-buttons">
                </form>
                </div>

        </ul>
    </div>
    <script src="../scripts/log-in.js"></script>
</body>
