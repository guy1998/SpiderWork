<?php

session_start();
include "../controller/functions.php";
include_once "../connector/connect.php";
$conn = connect('spiderwork', 'root', 'Aldrin/117');
$current_emp = fetchEmployer($_SESSION['userid'])

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/employerView.css" />
</head>
<body>

    <nav id="menu">
    <ul id="options">
        <li><a href="#home">Home</a></li>
        <li><a href="#employers">Employees</a></li>
    </ul>
    <ul id="sNp">
        <li><input type="text" placeholder="Search..."></li>
        <li><button type="button" onclick="dropdownOptions()"></button></li>
        <div id="optionsMenu">
            <ul id="optionLinks">
                <li><a href="profileCustomization.html">My account</a></li>
                <li><a href="">Settings</a></li>
                <li><a href="../controller/logOutController.php">Log out</a></li>
            </ul>
        </div>

    </ul>
    </nav>

    
    <nav id="feed">
    <ul id="feedlist"> 
        <li><a href="#Posts">Your listings</a></li>
        <li><a href="#Likes">Notifications</a></li>
    </ul>
    </nav>

    <div id="profile">
        <img src="<?php echo $current_emp['profilepic']; ?>" alt="image" width="100" height="100" id="profilePic">
        <p><?php echo $current_emp['companyName']; ?></p>
        <p>Name: <?php echo $current_emp['ownerName']; ?>  Surname: <?php echo $current_emp['ownerSurname']; ?></p>
        <p>Username: <?php echo $current_emp['username']; ?></p>
        <p>Field: <?php echo $current_emp['field']; ?></p>
        <p> <img  src="../images/pin.png" width="20" height="20"> Adress</p>
        <p> <img src="../images/email.png" width="20" height="20"> Email: <?php echo $current_emp['email']; ?></p>
    </div>

    <div id="suggested"> 
        <p style="font-weight: bold;"> Suggested for you</p>
        <p> <img src="../images/bg image.jpeg" width="30" height="30">User</p>
        <p> <img src="../images/bg image.jpeg" width="30" height="30">User1</p>
        <p> <img src="../images/bg image.jpeg" width="30" height="30">User2</p>
        <p> <img src="../images/bg image.jpeg" width="30" height="30">User3</p>
    </div>

    <div id="listingContainer">
    <?php 
    $sql = "SELECT * FROM joblisting WHERE employerid = :employerid";
    $statement = $conn->prepare($sql);
    try{
        $statement->execute(['employerid' => $_SESSION['userid']]);
    }catch(PDOException $error){
        var_dump($error);
    }
    $joblistings = $statement->fetchAll();
    $i = 0;
    while ($i < count($joblistings)){ ?>
    <div id="posts">
        <div id="profImage">
        </div>
        <div>
            <img id="setting" src="../images/menu.png" width="15" height="15">
            <div id="texts">
            <p><strong><?php echo $current_emp['companyName']; ?></strong></p>
            <p><?php echo $joblistings[$i]['job_title']; ?></p>
            <p><?php echo $joblistings[$i]['job_description']; ?></p>
            <img src="../images/heart.png" width="15" height="15">
            <img src="../images/chat-bubble.png" width="15" height="15">
            </div>
        </div>
    </div>
    <?php
       $i++; }
    ?>
    </div>
    <script src="../scripts/userview.js"></script>
    <script>

    </script>
</body>
</html>