<?php

session_start();
include "../controller/functions.php";
include_once "../connector/connect.php";
$conn = connect('spiderwork', 'root', 'Aldrin/117');
$user = fetchUser($_SESSION['userid']);
$seeker = fetchSeeker($_SESSION['userid']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/jobseekerView.css" />
</head>
<body>

    <nav id="menu">
    <ul id="options">
        <li><a href="#home">Home</a></li>
        <li><a href="page.php">Jobs</a></li>
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
        <li><a href="#Posts">Notifications</a></li>
        <li><a href="#Likes">Invitations</a></li>
        <!-- <li><a href="#Media">Media</a></li> -->
    </ul>
    </nav>

    <div id="profile">
        <img src=<?php echo $user['profilepic']; ?> alt="image" width="100" height="100" id="profilePic">
        <p>Name:<?php echo " ".$user['name']; ?>  Surname:<?php echo " ".$user['surname']; ?></p>
        <p>Username:<?php echo " ".$user['username']; ?></p>
        <p>Job: <?php echo " ".$seeker['field']; ?></p>
        <p> <img  src="../images/pin.png" width="20" height="20"> Adress</p>
        <p> <img src="../images/email.png" width="20" height="20"> Email: <?php echo " ".$user['email']; ?></p>
    </div>

    <div id="suggested"> 
        <p style="font-weight: bold;"> Suggested for you</p>
        <?php 
        $employersQuery = "SELECT * FROM employer WHERE field = :field";
        $statement2 = $conn->prepare($employersQuery);
        try{
            $statement2->execute(['field' => $seeker['field']]);
        }catch(PDOException $error){
            var_dump($error);
        }
        $employers = $statement2->fetchAll();
        $j = 0;
        while($j < count($employers)){ ?>
        <p> <img src=<?php echo $employers[$j]['profilepic']; ?> width="30" height="30"><?php echo $employers[$j]['companyName']; ?></p>
        <?php $j++; } ?>
    </div>

    <div id="listingContainer">
        <?php 
        $getNotification = "SELECT * FROM application_response WHERE userid = :userid";
        $statement3 = $conn->prepare($getNotification);
        try{
            $statement3->execute(['userid' => $seeker['userid']]);
        }catch(PDOException $error){
            var_dump($error);
        }
        $notifications = $statement3->fetchAll();
        $i = 0;
        while($i < count($notifications)){ ?>
        <?php 
        $currEmp = "SELECT * FROM employer WHERE employerid = :employerid";
        $currList = "SELECT * FROM joblisting WHERE listing_id = :listing_id";
        $statement4 = $conn->prepare($currEmp);
        $statement5 = $conn->prepare($currList);
        try{
            $statement4->execute(['employerid' => $notifications[$i]['employerid']]);
            $statement5->execute(['listing_id' => $notifications[$i]['listingid']]);
        }catch(PDOException $error){
            var_dump($error);
        }
        $nextEmp = $statement4->fetch();
        $nextList = $statement5->fetch();
        ?>
        <div id="posts">
        <div id="profImage">
        </div>
        <div>
            <img id="setting" src="../images/menu.png" width="15" height="15">
            <div id="texts">
            <p><strong><?php echo $nextEmp['companyName']; ?></strong></p>
            <p>You have been accepted for the position as <?php echo $nextList['job_title']; ?></p>
            </div>
        </div>
        </div>
        <?php $i++; }?>
        <?php if($i == 0): ?>
        <h3 id="nothingYet">No notifications yet</h3>
        <?php endif; ?>
    </div>
    <script src="../scripts/userview.js"></script>           
</body>
</html>