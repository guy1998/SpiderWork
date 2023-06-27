<?php

session_start();
if(isset($_SESSION['user_type'])) {
    if($_SESSION['user_type'] == "employer"){
        header("Location: employer.php");
        exit;
    }
    else{
        header("Location: jobseeker.php");
        exit;
    }
} 
    
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
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,600&family=Righteous&display=swap');
</style>
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
    <form id="login" method="POST" action="../controller/loginControl.php" onsubmit="validateForm();" class ="">
        <h1>SpiderWork</h1>
        <input type="text"  placeholder="username" name="username"><br>
        <input type = "password"  placeholder="password" name="password"><br>
        <?php if(isset($log_in_errors['error'])): ?>
            <p style="color: red; margin-left: 8vw;"><?php echo $log_in_errors['error']; ?></p>
        <?php endif; ?>
        <input type="submit" id="submitButton" value="Log-In" autofocus>
    </form>
    <button id="directSign" onclick="activateSignUp()">Sign-Up</button>
    <div id="wait" class="waiting">
        <h1 id="prompt">Make your first move here</h1>
        <h2 id="choice">You're seeking to:</h2>
        <ul id="types">
            <li onclick="activateWorkerForm()">WORK</li>
            <div id="formWorker">
                <form method="POST" name = "formwork" onsubmit="return validateWorker()" action="../controller/user.php" enctype="multipart/form-data">
                    <h3>General information:</h3>
                    <div class="form-group workForm">
                        <label>Name</label>
                        <input type="text" name ='name'><br>
                    </div>
                    <div class="form-group workForm">
                        <label>Surname</label>
                        <input type="text" name="surname"><br>
                    </div>
                    <div class="form-group workForm">
                        <label>E-mail</label>
                        <input type="text" name="email"><br>
                    </div>
                    <div class="form-group workForm">
                        <label>Phone</label>
                        <input type="text" name ='phone'>
                    </div>
                    <div class="form-group workForm">
                        <label>Birthday</label>
                        <input type="date" name ='birthday'>
                    </div>
                    <div class="form-group workForm">
                        <label>Work field</label>
                        <input type="text" name ='field'>
                    </div>
                    <div class="form-group workForm">
                        <label>Username</label>
                        <input type="text" name ='username'>
                    </div>
                    <div class="form-group workForm">
                        <label>Password</label>
                        <input type="password" name ='password' class="pass">
                    </div>
                    <h3>Professional experience:</h3>
                    <div id="readField">
                        <h4>Employer</h4>
                        <div class="form-group workForm">
                            <label>Employer's name</label>
                            <input type="text" name ='empName'>
                        </div>
                        <div class="form-group workForm">
                            <label>Years</label>
                            <input type="number" name ='years'>
                        </div>
                        <div class="form-group workForm">
                            <label>Description</label>
                            <textarea name="jobDesc"></textarea>
                        </div>
                    </div>
                    <h3>Education:</h3>
                    <div id="readField2">
                        <h4>School</h4>
                        <div class="form-group workForm">
                            <label>School's name</label>
                            <input type="text" name ='school'>
                        </div>
                        <div class="form-group workForm">
                            <label>Degree</label>
                            <input type="text" name ='degree'>
                        </div>
                    </div>
                    <p class="errorMessage"></p>
                    <input type="submit" name="signUp1" id="signUp1" value="Sign-Up" class="add-buttons">
                </form>
            </div>

            <li onclick="activateEmployeeForm()">EMPLOY</li>
            <div id="formEmp">
            <form method="post" onsubmit="return validateEmployer()" action="../controller/empSignUp.php" name="formemp">
                <h3>General information:</h3>
                <div class="form-group empForm">
                    <label>Company's name</label>
                    <input type="text" name ='Coname'><br>
                </div>
                <div class="form-group empForm">
                    <label>Owner's name</label>
                    <input type="text" name="Oname"><br>
                </div>
                <div class="form-group empForm">
                    <label>Owner's surname</label>
                    <input type="text" name="Osurname"><br>
                </div>
                <div class="form-group empForm">
                    <label>Contact's name</label>
                    <input type="text" name="Contactname"><br>
                </div>
                <div class="form-group empForm">
                    <label>Contact's surname</label>
                    <input type="text" name="Contactsurname"><br>
                </div>
                <div class="form-group empForm">
                    <label>E-mail</label>
                    <input type="text" name="email"><br>
                </div>
                <div class="form-group empForm">
                    <label>Phone</label>
                    <input type="text" name ='phone'>
                </div>
                <div class="form-group empForm">
                    <label>Founding date</label>
                    <input type="date" name ='fd'>
                </div>
                <div class="form-group empForm">
                    <label>Work field</label>
                    <input type="text" name ='field'>
                </div>
                <h3>Account credentials</h3>
                <div class="form-group empForm">
                        <label>Username</label>
                        <input type="text" name ='username'>
                    </div>
                    <div class="form-group empForm">
                        <label>Password</label>
                        <input type="password" name ='password' class="pass">
                    </div>
                <p class="errorMessage"></p>
                <input type="submit" name="signUp2" id="signUp2" value="Sign-Up" class="add-buttons">
            </form>
            </div>

            <!-- <li onclick="activateReqForm()">CONNECT</li>
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
                    <div class="form-group" id="pass">
                        <label>Password</label>
                        <input type="password" name ='password' required>
                    </div>
                    <h3>Professional information:</h3>
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" name ='website'>
                    </div>
                    <p class="errorMessage"></p>
                    <input type="submit" name="signUp3" id="signUp3" value="Sign-Up" class="add-buttons">
                </form>
                </div> -->

        </ul>
    </div>

    <div class="spider" id="spider">
        <div class="spiderweb"></div>
        <div class="body">
            <div class="eye left"></div>
            <div class="eye right"></div>
        </div>
        <div class="legs left">
            <div class="leg"></div>
            <div class="leg"></div>
            <div class="leg"></div>
        </div>
        <div class="legs right">
            <div class="leg"></div>
            <div class="leg"></div>
            <div class="leg"></div>
        </div>
    </div>

    <script src="../scripts/log-in.js"></script>
    <script src="../scripts/loginValidate.js"></script>
    <script src="../scripts/signUpValidate.js"></script>
</body>
