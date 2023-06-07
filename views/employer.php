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
<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

::selection {
    background: rgba(23, 162, 184, 0.3);
}

.wrapper {
    max-width: 600px;
    max-height: 500px;
    width: 100%;
    margin: 10px auto;
    padding: 0px 50px 30px 30px;
    border-radius: 5px;
    overflow: auto;
    background: #f4eeff;
    box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
}

.wrapper header {
    font-size: 30px;
    font-weight: 600;
    padding-bottom: 20px;
    padding-top: 10px;
}

.wrapper nav {
    position: relative;
    width: 100%;
    height: 50px;
    display: flex;
    align-items: center;
}

.wrapper nav label {
    display: block;
    height: 100%;
    width: 100%;
    text-align: center;
    line-height: 50px;
    cursor: pointer;
    position: relative;
    z-index: 1;
    color: #424874;
    font-size: 17px;
    border-radius: 5px;
    margin: 0 5px;
    transition: all 0.3s ease;
    font-weight: bold;
}

.wrapper::-webkit-scrollbar {
    display: none;
}

#bachelor:checked~nav label.bachelor,
#master:checked~nav label.master {
    color: #fff;
}

#bachelor:not(:checked)~nav label.bachelor,
#master:not(:checked)~nav label.master {
    background: #a6b1e1;
}

nav label i {
    padding-right: 7px;
}

nav .slider {
    position: absolute;
    height: 100%;
    width: 50%;
    left: 0;
    bottom: 0;
    z-index: 0;
    border-radius: 5px;
    background: #424874;
    transition: all 0.3s ease;
}

input[type="radio"] {
    display: none;
}

#master:checked~nav .slider {
    left: 50%;
}

section .content {
    display: none;
    background: #f4eeff;
    padding-top: 15px;
}

#bachelor:checked~section .content-1,
#master:checked~section .content-2 {
    display: block;
}

section .content p {
    text-align: justify;
}

section label {
    font-weight: 600;
}

.logo img {
    margin-top: 10px;
    max-width: 100px;
    max-height: 50px;
    float: right;
}

.select {
    padding: 8px 12px;
    color: #333333;
    background-color: white;
    border: 2px solid #ddd;
    border-radius: 5px;
    width: calc(100% - 20px);
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-repeat: no-repeat;
    background-size: 10px;
    padding-right: 30px;
    margin-bottom: 10px;
    font-family: Poppins;
    font-weight: 600;
}

.select option {
    background: #ffffff;
    font-family: Poppins;
    font-weight: bold;
}

.select:focus,
.select:hover {
    outline: none;
    border: 2px solid #424874;
}

.title {
    padding-bottom: 10px;
}

.submit {
    padding: 5px 15px;
    background: linear-gradient(90deg, #424874, #28d1ce);
    color: #fff;
    border: 0 none;
    cursor: pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px;
}

.star {
    color: red;
}

.button {
    height: 45px;
    margin: 20px 0;
}

.listingBtn {
    height: 100%;
    width: 100%;
    margin-bottom: 5px;
    outline: none;
    color: #fff;
    border: none;
    font-size: 18px;
    font-weight: 500;
    border-radius: 5px;
    letter-spacing: 1px;
    background: linear-gradient(135deg, #424874, #a6b1e1);
    cursor: pointer;
    font-family: 'Poppins';
    font-style: normal;
}

.listingBtn:hover {
    background: linear-gradient(-135deg, #424874, #a6b1e1);

}
</style>

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
        <p> <img src=<?php echo $seekers[$j]['profilepic'] ?> width="30"
                height="30"><?php echo $seekers[$j]['name'] . " " . $seekers[$j]['surname']; ?></p>
        <?php $j++;
        }
        ?>
        <?php if ($j == 0) : ?>
        <h5 style="margin: 15vh 0 0 1.5vw;">Sorry nothing to suggest right now</h5>
        <?php endif; ?>
    </div>

    <div class="wrapper">
        <br>
        <input type="radio" name="slider" checked id="bachelor" />
        <input type="radio" name="slider" id="master" />
        <nav>
            <label for="bachelor" class="bachelor"><i class="bachelor"></i>Listings</label>
            <label for="master" class="master"><i class="master"></i>Notifications</label>
            <div class="slider"></div>
        </nav>
        <section>
            <div class="content content-1">
                <form action="addListing.php" method="post">
                    <div class="button">
                        <input type="submit" class="listingBtn" value="Add New Listings">
                    </div>
                </form>
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
                <div id="posts program" class="select">
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
            <div class="content content-2">
                    <?php 
                        $getAppQuery = "SELECT * FROM application WHERE employerid = :employerid";
                        $appStatement = $conn->prepare($getAppQuery);
                        try{
                            $appStatement->execute(['employerid'=>$_SESSION['userid']]);
                        }
                        catch(PDOException $error){
                            var_dump($error);
                        }
                        $applications = $appStatement->fetchAll();
                        $k = 0;
                        while($k < count($applications)){
                    ?>
                        <div id="posts program" class="select">
                        <div id="profImage">
                        </div>
                        <div>
                            <?php 
                                $applicantSql = "SELECT * FROM person WHERE userid = :userid";
                                $joblistingsSql = "SELECT * FROM joblisting WHERE listing_id = :listing_id";
                                $applicantStatement = $conn->prepare($applicantSql);
                                $joblistingsStatement = $conn->prepare($joblistingsSql);
                                try{
                                    $applicantStatement->execute(['userid'=>$applications[$k]['userid']]);
                                    $joblistingsStatement->execute(['listing_id'=>$applications[$k]['listing_id']]);
                                }catch(PDOException $error){
                                    var_dump($error);
                                }
                                $current_applicant = $applicantStatement->fetch();
                                $current_position = $joblistingsStatement->fetch();
                            ?>
                            <img id="setting" src="../images/menu.png" width="15" height="15">
                            <div id="texts">
                                <p><strong><?php echo $current_applicant['name']." ".$current_applicant['surname']; ?></strong></p>
                                <p>Applied for the position of<?php echo " ".$current_position['job_title']; ?></p>
                                <p>Date of application:<?php echo " ".$applications[$k]['application_date']; ?></p>
                                <img src="../images/heart.png" width="15" height="15">
                                <img src="../images/chat-bubble.png" width="15" height="15">
                            </div>
                        </div>
                        <?php 
                            $k++;
                        }
                        ?>
                    </div>                    
            </div>
        </section>
    </div>

    <script src="../scripts/userview.js"></script>
    <script>

    </script>
</body>

</html>