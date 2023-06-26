<?php

session_start();
include_once "../connector/connect.php";

$conn = connect('spiderwork', 'root', '');

$listing_id = $_SESSION['listing_id'];
$current_date = date('Y-m-d');
$userid = $_SESSION['userid'];

$sql = "INSERT INTO application VALUES (:userid, (SELECT employerid FROM joblisting WHERE listing_id = :listing_id), :listing_id, :current_date)";

$statement = $conn->prepare($sql);
try{
    $statement->execute([
        'userid'=>$userid,
        'listing_id'=>$listing_id,
        'current_date'=>$current_date
    ]);
}catch(PDOException $error){
    $_SESSION['application_error'] = "You have already applied.";
}

header("location: ../views/page.php");