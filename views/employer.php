<?php

session_start();
include "../controller/functions.php";
include_once "../connector/connect.php";
$conn = connect('spiderwork', 'root', '');
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
        <p>Name: <?php echo $current_emp['ownerName']; ?> Surname: <?php echo $current_emp['ownerSurname']; ?></p>
        <p>Username: <?php echo $current_emp['username']; ?></p>
        <p>Field: <?php echo $current_emp['field']; ?></p>
        <p> <img src="../images/pin.png" width="20" height="20"> Adress</p>
        <p> <img src="../images/email.png" width="20" height="20"> Email: <?php echo $current_emp['email']; ?></p>
    </div>

    <div id="suggested">
        <p style="font-weight: bold;"> Suggested for you</p>
        <?php
        $getSeeker = "SELECT * FROM person WHERE userid IN (SELECT userid FROM jobseeker WHERE field = :field)";
        $statement2 = $conn->prepare($getSeeker);
        try {
            $statement2->execute(['field' => $current_emp['field']]);
        } catch (PDOException $error) {
            var_dump($error);
        }
        $seekers = $statement2->fetchAll();
        $j = 0;
        while ($j < count($seekers)) { ?>
            <p> <img src=<?php echo $seekers[$j]['profilepic'] ?> width="30" height="30"><?php echo $seekers[$j]['name'] . " " . $seekers[$j]['surname']; ?></p>
        <?php $j++;
        }
        ?>
        <?php if ($j == 0) : ?>
            <h5 style="margin: 15vh 0 0 1.5vw;">Sorry nothing to suggest right now</h5>
        <?php endif; ?>
    </div>

    <div id="listingContainer">
        <?php
        $sql = "SELECT * FROM joblisting WHERE employerid = :employerid";
        $statement = $conn->prepare($sql);
        try {
            $statement->execute(['employerid' => $_SESSION['userid']]);
        } catch (PDOException $error) {
            var_dump($error);
        }
        $joblistings = $statement->fetchAll();
        $i = 0;
        while ($i < count($joblistings)) { ?>
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
            $i++;
        }
        ?>
        <?php if ($i == 0) : ?>
            <h3 id="nothingYet">No listings yet</h3>
        <?php endif; ?>
    </div>
    <script src="../scripts/userview.js"></script>
    <script>

    </script>
</body>

</html>