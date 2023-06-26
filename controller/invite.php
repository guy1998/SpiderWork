<?php

session_start();

$connection = require_once "../connector/connect.php";

$sql = "INSERT INTO invitation VALUES (:userid, :employerid)";

$stmt = $connection->prepare($sql);

$response = "This employee has been invited successfully.";

try{
    $stmt->execute([
        'employerid'=>$_SESSION['userid'],
        'userid'=>$_SESSION['viewableId']
    ]);
}
catch(PDOException $error) {
    $response = "You have already invited this job seeker.";
}

echo $response;