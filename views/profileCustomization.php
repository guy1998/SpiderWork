<?php

session_start();
include "../controller/functions.php";
include_once "../connector/connect.php";
$conn = connect('spiderwork', 'root', 'Aldrin/117');
if($_SESSION['user_type'] == "employer"){
  $current_user = fetchEmployer($_SESSION['userid']);
}else{
  $current_user = fetchUser($_SESSION['userid']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Customization</title>
  <link rel="stylesheet" href="../styles/profileCustomization.css">
</head>

<body>
  <div class="container">
    <div class="profile-section">
      <div class="profile-details">
          <img class="profile-photo" src=<?php echo $current_user['profilepic']; ?> ></img>
        <?php if($_SESSION['user_type'] == "employer"): ?>
          <h2 class="full-name"><?php echo $current_user['companyName']?></h2>
        <?php else: ?>
        <h2 class="full-name"><?php echo $current_user['name']." ".$current_user['surname']; ?></h2>
        <?php endif; ?>
      </div>
    </div>
    <div class="content-section">
      <div class="left-section">
        <h2 class="section-heading">Basic Information</h2>
        <div class="form-group">
          <?php if($_SESSION['user_type'] == "employer"): ?>
            <label for="name">Company Name</label>
            <input type="text" id="name1" name="name" required value=<?php echo $current_user['companyName']; ?>>
          <?php else: ?>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required value=<?php echo $current_user['name']; ?>>
          <?php endif; ?>
        </div>
        <div class="form-group">
            <?php if($_SESSION['user_type'] == "employer"): ?>
              <label for="surname">Owner Name</label>
              <input type="text" id="surname1" name="surname" required value=<?php echo $current_user['companyName']; ?>>
            <?php else: ?>
              <label for="surname">Surname</label>
              <input type="text" id="surname" name="surname" required value=<?php echo $current_user['surname']; ?>>
            <?php endif; ?>
        </div>
        <?php if($_SESSION['user_type'] == "employer"): ?>
          <div class="form-group">
            <label for="surname">Owner Surname</label>
            <input type="text" id="surname2" name="surname" required value=<?php echo $current_user['companyName']; ?>>
          </div>
        <?php endif; ?>
        <?php 
        if(!($_SESSION['user_type'] == "employer")){
          $retreivePhone = "SELECT phone_number FROM phone_numbers WHERE person_id = :userid";
          $phoneStatement = $conn->prepare($retreivePhone);
          try{
            $phoneStatement->execute(['userid' => $current_user['userid']]);
          }catch(PDOException $error){
            var_dump($error);
          }
          $currentPhoneNumber = $phoneStatement->fetch();
        }else{
          $retreivePhone = "SELECT phoneNumber FROM employerphone WHERE employerId = :userid";
          $phoneStatement = $conn->prepare($retreivePhone);
          try{
            $phoneStatement->execute(['userid' => $current_user['employerId']]);
          }catch(PDOException $error){
            var_dump($error);
          }
          $currentPhoneNumber =$phoneStatement->fetch();
        }
        ?>
        <div class="form-group">
          <label for="phone">Phone number</label>
          <input type="text" id="phone" name="phone" required value="<?php echo $currentPhoneNumber[0]; ?>">
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" required value=<?php echo $current_user['email']; ?>>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required value=<?php echo $current_user['username']; ?>>
        </div>
        <!-- <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div> -->
      </div>
      <div class="right-section">
        <h2 class="section-heading">System Settings</h2>
        <div class="system-settings">
          <div class="language">
            <label for="language">Language</label>
            <div class="language-tester">
              <form class="lang-drop" method="get" action="#">
                <select name="language" id="language-selector" class="language-selector">
                    <option value="eng-us">English,US</option>
                    <option value="en-uk">English,UK</option>
                    <option value="eng-aus">English,AUS</option>
                    <option value="eng-ca">English,CA</option>
                    <option value="alb">Albanian</option>
                </select>
              </form>
              </div>
          </div>
          <div class="privacy-settings">
            <label for="privacy-settings">Privacy Settings</label>
            <p>In our job seeking app, we prioritize transparency and openness, which means that your profile information will be visible to all users. This includes your profile photo, username, contact information, and address. However, we take data privacy seriously and implement measures to safeguard your information. Rest assured that we adhere to strict security protocols to protect your data from unauthorized access. We recommend being mindful of the information you choose to share and encourage you to review our privacy policy to understand how we handle and protect your data. If you have any concerns or questions regarding your privacy, our support team is available to assist you.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="button-section">
      <button class="save-button" onclick="modifyUser('<?php echo $_SESSION['user_type']; ?>')">Save</button>
      <button class="save-button" onclick=""></button>
      <button class="delete-account-button">Delete Account</button>
    </div>
  </div>
  <script>
    const modifyUser = function(usertype){

      if(usertype === "employer"){

                let companyName = document.getElementById('name1').value;
                let ownerName = document.getElementById('surname1').value;
                let ownerSurname = document.getElementById('surname2').value;
                let phone = document.getElementById("phone").value;
                let email = document.getElementById("email").value;
                let username = document.getElementById("username").value;

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../controller/modifyUser.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                    console.log('Session variable set successfully');
                    } else {
                    console.error('Error setting session variable');
                    }
                }
                };
                var data = 'username=' + encodeURIComponent(username) +
           '&companyName=' + encodeURIComponent(companyName) +
           '&ownerName=' +encodeURIComponent(ownerName) +
           '&ownerSurname=' + encodeURIComponent(ownerSurname) +
           '&email=' + encodeURIComponent(email) +
           '&phone=' + encodeURIComponent(phone);
            console.log(data);
           xhr.send(data);
      }else{
            let name = document.getElementById("name").value;
            let surname = document.getElementById("surname").value;
            let phone = document.getElementById("phone").value;
            let email = document.getElementById("email").value;
            let username = document.getElementById("username").value;
            if(name && surname && phone && email && username){
              var xhr = new XMLHttpRequest();
                xhr.open('POST', '../controller/modifyUser.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                    console.log('Session variable set successfully');
                    } else {
                    console.error('Error setting session variable');
                    }
                }
                };
                var data = 'username=' + encodeURIComponent(username) +
           '&name=' + encodeURIComponent(name) +
           '&surname=' + encodeURIComponent(surname) +
           '&email=' + encodeURIComponent(email) +
           '&phone=' + encodeURIComponent(phone);
           console.log("Before data");
            console.log(data)
            console.log("After data");
            xhr.send(data);
            
      }
    }
  }
  </script>
</body>

</html>