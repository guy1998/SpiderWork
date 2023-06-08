<?php

session_start();
$connection = require_once "../connector/connect.php";

$name = isset($_POST['name']) ? $_POST['name'] : '';
$surname = isset($_POST['surname']) ? $_POST['surname'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$pinned = isset($_POST['website']) ? $_POST['website'] : 'none';

$sql = "INSERT INTO person (name, surname, email, username, password, birthday, profilepic) VALUES (:name, :surname, :email, :username, :password, :birthday, '..images/user.png')";
$phone_sql = "INSERT INTO phone_numbers VALUES ((SELECT COUNT(*) FROM person), :phone)";
$sql2 = "INSERT INTO recruiter VALUES((SELECT COUNT(*) FROM person), NULL, :pinned)";

$statement = $connection->prepare($sql);
$statement1 = $connection->prepare($phone_sql);
$statement2 = $connection->prepare($sql2);

try{
    $statement->execute([
        'name'=>$name,
        'surname'=>$surname,
        'email'=>$email,
        'password'=>$password,
        'username'=>$username,
        'birthday'=>$birthday
    ]);

    $statement1->execute([
        'phone'=>$phone
    ]);

    $statement2->execute([
        'pinned'=>$pinned
    ]);
}catch(PDOException $error){
    var_dump($error);
}

$sql3 = "SELECT userid FROM person WHERE username=:username";
$statement3 = $connection->prepare($sql3);
try{
    $statement3->execute(['username'=>$username]);
}catch(PDOException $error){
    var_dump($error);
}

$result = $statement3->fetchAll();
$_SESSION['userid'] = $result[0]['userid'];

header("Location: ../views/recruiter.php");
