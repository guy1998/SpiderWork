<?php

session_start();
$connection = require_once "../connector/connect.php";

$comp_name = isset($_POST['Coname']) ? $_POST['Coname'] : '';
$owner_name = isset($_POST['Oname']) ? $_POST['Oname'] : '';
$owner_surname = isset($_POST['Osurname']) ? $_POST['Osurname'] : '';
$contact_name = isset($_POST['Contactname']) ? $_POST['Contactname'] : '';
$contact_surname = isset($_POST['Contactsurname']) ? $_POST['Contactsurname'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$fd = isset($_POST['fd']) ? $_POST['fd'] : '';
$field = isset($_POST['field']) ? $_POST['field'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password1 = isset($_POST['password']) ? $_POST['password'] : '';
include_once ("../controller/functions.php");

if(checkIfExist($username)){
    header("Location: ../views/userExist.php");
}else{

$sql = "INSERT INTO employer (contactName, contactSurname, companyName, ownerName, ownerSurname, field, email, username, password, foundingDate, profilepic) VALUES (:contactName, :contactSurname, :companyName, :ownerName, :ownerSurname, :field, :email, :username, :password, :foundingDate, '../images/defaultUser.png')";
$phone_sql = "INSERT INTO employerphone VALUES ((SELECT COUNT(*) FROM employer), :phone)";

$statement = $connection->prepare($sql);
$statement2 = $connection->prepare($phone_sql);

try{
    $statement->execute([
        'contactName'=>$contact_name,
        'contactSurname'=>$contact_surname,
        'companyName'=>$comp_name,
        'ownerName'=>$owner_name,
        'ownerSurname'=>$owner_surname,
        'field'=>$field,
        'email'=>$email,
        'password'=>$password1,
        'username'=>$username,
        'foundingDate'=>$fd
    ]);

    $statement2->execute([
        'phone'=>$phone
    ]);
}catch(PDOException $error){
    var_dump($error);
}

$sql3 = "SELECT employerId FROM Employer WHERE username = :username";
$statement3 = $connection->prepare($sql3);
try{
    $statement3->execute(['username'=>$username]);
}catch(PDOException $error){
    var_dump($error);
}

$result = $statement3->fetchAll();
$_SESSION['userid'] = $result[0]['employerId'];
$_SESSION['user_type'] = "employer";

header("Location: ../views/employer.php");

}