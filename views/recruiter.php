<?php

session_start();
include "../controller/functions.php";
$user = fetchUser($_SESSION['userid']);
$current_recruiter = fetchRec($_SESSION['userid']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/userview.css" />
</head>
<body>

    <nav id="menu">
    <ul id="options">
        <li><a href="#home">Home</a></li>
        <li><a href="#jobs">Employees</a></li>
        <li><a href="#employers">Employers</a></li>
    </ul>
    <ul id="sNp">
        <li><input type="text" placeholder="Search..."></li>
        <li><button type="button"></button></li>
        <div id="optionsMenu">
            <ul>
                <li><a href="">My account</a></li>
                <li><a href="">Settings</a></li>
                <li><a href="">Log out</a></li>
            </ul>
        </div>

    </ul>
    </nav>

    
    <nav id="feed">
    <ul id="feedlist"> 
        <li><a href="#Posts">Listings</a></li>
        <li><a href="#Likes">Notifications</a></li>
        <li><a href="#Media">Media</a></li>
    </ul>
    </nav>

    <div id="profile">
        <img src="../images/bg image.jpeg" alt="image" width="100" height="100" id="profilePic">
        <p>Name:<?php echo " ".$user['name']; ?>  Surname:<?php echo " ".$user['surname']; ?></p>
        <p>Username:<?php echo " ".$user['username']; ?></p>
        <p>Rating: <?php echo " ".$current_recruiter['rating']; ?></p>
        <p> <img  src="../images/pin.png" width="20" height="20"> Adress</p>
        <p> <img src="../images/email.png" width="20" height="20"> Email: <?php echo " ".$user['email']; ?></p>
    </div>

    <div id="suggested"> 
        <p style="font-weight: bold;"> Suggested for you</p>
        <p> <img src="../images/bg image.jpeg" width="30" height="30">User</p>
        <p> <img src="../images/bg image.jpeg" width="30" height="30">User1</p>
        <p> <img src="../images/bg image.jpeg" width="30" height="30">User2</p>
        <p> <img src="../images/bg image.jpeg" width="30" height="30">User3</p>
    </div>

    <div id="posts">
        <div id="profImage">
        </div>
        <div>
            <img id="setting" src="../images/menu.png" width="15" height="15">
            <div id="texts">
            <p><strong>User name</strong></p>
            <p>This is sth that the user posted</p>
            <img src="../images/heart.png" width="15" height="15">
            <img src="../images/chat-bubble.png" width="15" height="15">
            </div>
        </div>
    </div>

</body>
</html>