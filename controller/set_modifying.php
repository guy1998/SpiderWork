<?php

session_start();

if(isset($_POST['username']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone']) && isset($_POST['email']) && $_SESSION['user_type'] == 'seeker'){
    $_SESSION['newUsername'] = $_POST['username'];
    $_SESSION['newName'] = $_POST['name'];
    $_SESSION['newSurname'] = $_POST['surname'];
    $_SESSION['newPhone'] = $_POST['phone'];
    $_SESSION['newEmail'] = $_POST['email'];
}else if (isset($_POST['username']) && isset($_POST['companyName']) && isset($_POST['ownerName']) && isset($_POST['ownerSurname']) && isset($_POST['email']) && isset($_POST['phone'])){
    $_SESSION['newUsername'] = $_POST['username'];
    $_SESSION['newCompanyName'] = $_POST['companyName'];
    $_SESSION['newOwnerName'] = $_POST['ownerName'];
    $_SESSION['newOwnerSurname'] = $_POST['ownerSurname'];
    $_SESSION['newEmail'] = $_POST['email'];
    $_SESSION['newPhone'] = $_POST['phone'];
}