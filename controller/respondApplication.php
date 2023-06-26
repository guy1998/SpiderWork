<?php

session_start();

include_once "../connector/connect.php";
//TODO: Change the null
$sql = "INSERT INTO application_response VALUES (:listing_id, :userid, :employerid, NULL, 1)";
$sql2 = "DELETE FROM application WHERE userid=:userid AND listing_id=:listing_id";

$conn = connect('spiderwork', 'root', '');

$stmt = $conn->prepare($sql);
$stmt2 = $conn->prepare($sql2);

try{
    $stmt->execute([
        'employerid'=>$_SESSION['userid'],
        'userid'=>$_SESSION['viewableId'],
        'listing_id'=>$_SESSION['viewableListing']
    ]);

    $stmt2->execute([
        'userid'=>$_SESSION['viewableId'],
        'listing_id'=>$_SESSION['viewableListing']
    ]);
}catch(PDOException $error){
    var_dump($error);
}

header("location: ../views/employer.php");

?>