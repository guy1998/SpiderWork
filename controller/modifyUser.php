<?php

session_start();

if (
    isset($_POST['username']) &&
    isset($_POST['name']) &&
    isset($_POST['surname']) &&
    isset($_POST['email']) &&
    isset($_POST['phone'])
){
$userid = $_SESSION['userid'];

$newName = $_POST['name'];
$newSurname = $_POST['surname'];
$newEmail = $_POST['email'];
$newUsername = $_POST['username'];
$newPhone = $_POST['phone'];

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

$stmt1 = $conn->prepare("UPDATE phone_numbers SET phone_number = ? WHERE person_id = ?");
$stmt1->bind_param("si", $newPhone, $userid);
$stmt1->execute();

if ($stmt->affected_rows > 0) {
    echo "User information updated successfully.";
} else {
    echo "Failed to update user information.";
}

header("Location: ../views/jobseeker.php");

}else if(
    $_SESSION['user_type']=="employer" &&
    isset($_POST['username']) &&
    isset($_POST['companyName']) &&
    isset($_POST['ownerName']) &&
    isset($_POST['ownerSurname']) &&
    isset($_POST['email']) &&
    isset($_POST['phone'])
){
    $userid = $_SESSION['userid'];

    $newCompanyName = $_POST['companyName'];
    $newOwnerName = $_POST['ownerName'];
    $newOwnerSurname = $_POST['ownerSurname'];
    $newEmail = $_POST['email'];
    $newUsername = $_POST['username'];
    $newPhone = $_POST['phone'];
    
    $stmt = $conn->prepare("UPDATE employer SET companyName = ?, ownerName = ?, ownerSurname = ?, email = ?, username = ? WHERE employerid = ?");
    $stmt->bind_param("sssssi", $newCompanyName, $newOwnerName, $newEmail, $newUsername, $userid);
    $stmt->execute();
    
    $stmt1 = $conn->prepare("UPDATE employerphone SET phoneNumber = ? WHERE employerid = ?");
    $stmt1->bind_param("si", $newPhone, $userid);
    $stmt1->execute();
    
    if ($stmt->affected_rows > 0) {
        echo "User information updated successfully.";
    } else {
        echo "Failed to update user information.";
    }

header("location: ../views/employer.php");
}else{
    header("location: ../views/jobseeker.php");
    echo "Something went terribly wrong mate";
}