<?php

session_start();

include_once "../connector/connect.php";
//TODO: Change the null
$sql = "INSERT INTO application_response VALUES (:employerid, :userid, :listing_id, NULL, 0)";
$conn = connect('spiderwork', 'root', '');

$stmt = $conn->prepare($sql);

try{
    $stmt->execute([
        'employerid'=>$_SESSION['userid'],
        'userid'=>$_SESSION['viewableId'],
        'listing_id'=>$_SESSION['viewableListing']
    ]);
}catch(PDOException $error){
    var_dump($error);
}

header("location: ../views/employer.php");