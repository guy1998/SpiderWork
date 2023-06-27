<?php

session_start();
include "../controller/functions.php";
include_once "../connector/connect.php";
$viewable = fetchUser($_SESSION['viewableId']);
$conn = connect('spiderwork', 'root', 'Aldrin/117');
$phoneNumberSql = "SELECT phone_number FROM phone_numbers WHERE person_id = :person_id";
$phoneStmt = $conn->prepare($phoneNumberSql);
try{
    $phoneStmt->execute(['person_id'=>$viewable['userid']]);
}catch(PDOException $error){
    var_dump($error);
}

$current_phone_number = $phoneStmt->fetch()[0];

$seeker = fetchSeeker($viewable['userid']);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../styles/viewJobSeeker.css" />
    </head>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
    </style>
    <body>
        <div id="main">
        <img src="../images/defaultUser.png" alt="Profile image" width="70" height="70">
        <h3><?php echo $viewable['name']." ".$viewable['surname']; ?></h3>
        <div id="contact">
            <h4>Phone:<?php echo " ".$current_phone_number; ?></h4>
            <h4>Email:<?php echo " ".$viewable['email']; ?></h4>
        </div>
        <div id="professional">
            <h4>Working field:<?php echo " ".$seeker['field']; ?></h4>
            <h4>Education:</h4>
            <p><?php echo $seeker['education']; ?></p>
            <h4>Most recent job:</h4>
            <p><?php echo $seeker['experience']; ?></p>
        </div>
        <div>
        <div id="buttonsDiv">
            <button onclick="invite()">Invite</button>
            <button onclick="goBack()">Back</button>
        </div>
        <script>
            const goBack = function(){
                window.location.href = "../views/employer.php";
            }
            
            const invite = function() {
                fetch('../controller/invite.php')
                    .then(response => response.text())
                    .then(data => {
                        alert(data);
                    });
            }
        </script>
    </body>
</html>
