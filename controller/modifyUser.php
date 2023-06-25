<?php

session_start();
$conn = require_once("../connector/connect.php");

if (
   isset($_SESSION['newUsername']) &&
   isset($_SESSION['newEmail']) &&
   isset($_SESSION['newPhone']) &&
   isset($_SESSION['newName']) &&
   isset($_SESSION['newSurname'])
){
$userid = $_SESSION['userid'];

$newName = $_SESSION['newName'];
$newSurname = $_SESSION['newSurname'];
$newEmail = $_SESSION['newEmail'];
$newUsername = $_SESSION['newUsername'];
$newPhone = $_SESSION['newPhone'];

$stmt = $conn->prepare("UPDATE person SET name = :name, surname = :surname, email = :email, username = :username WHERE userid = :userid");
try{
    $stmt->execute([
        'name'=> $newName,
        'surname'=>$newSurname,
        'email'=>$newEmail,
        'username'=>$newUsername,
        'userid'=>$userid
    ]);
}catch(PDOException $error){
    var_dump($error);
}

$stmt1 = $conn->prepare("UPDATE phone_numbers SET phone_number = :phone WHERE person_id = :id");

$stmt1->execute(["phone"=>$newPhone, "id"=>$userid]);

if ($stmt->affected_rows > 0) {
    echo "User information updated successfully.";
} else {
    echo "Failed to update user information.";
}

header("Location: ../views/jobseeker.php");

}else if(
    $_SESSION['user_type']=="employer" && 
    isset($_SESSION['newUsername']) &&
    isset($_SESSION['newEmail']) &&
    isset($_SESSION['newPhone']) &&
    isset($_SESSION['newCompanyName']) &&
    isset($_SESSION['newOwnerSurname']) && 
    isset($_SESSION['newOwnerName'])
){
    $userid = $_SESSION['userid'];

    $newCompanyName = $_SESSION['newCompanyName'];
    $newOwnerName = $_SESSION['newOwnerName'];
    $newOwnerSurname = $_SESSION['newOwnerSurname'];
    $newEmail = $_SESSION['newEmail'];
    $newUsername = $_SESSION['newUsername'];
    $newPhone = $_SESSION['newPhone'];
    
    $stmt = $conn->prepare("UPDATE employer SET companyName = :compName, ownerName = :ownerName, ownerSurname = :ownerSurname, email = :email, username = :username WHERE employerid = :empId");
    
    try{
        $stmt->execute([
            'compName'=>$newCompanyName,
            'ownerName'=>$newOwnerName,
            'ownerSurname'=>$newOwnerSurname,
            'email'=>$newEmail,
            'username'=>$newUsername,
            'empId'=>$userid
        ]);
    }catch(PDOException $error){
        var_dump($error);
    }
    
    $stmt1 = $conn->prepare("UPDATE employerphone SET phoneNumber = :phone WHERE employerid = :empId");

    try{
        $stmt1->execute([
            'phone'=>$newPhone,
            'empId'=>$userid
        ]);
    }catch(PDOException $error){
        var_dump($error);
    }
    
    if ($stmt->affected_rows > 0) {
        echo "User information updated successfully.";
    } else {
        echo "Failed to update user information.";
    }

header("location: ../views/employer.php");
}else{
    //header("location: ../views/jobseeker.php");
    echo "Something went terribly wrong mate";
}