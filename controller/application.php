<?php

session_start();
include_once "../connector/connect.php";

$conn = connect('spiderwork', 'root', '');

if (isset($_SESSION['userid'])) {

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

        $_SESSION['application_validity'] = "Your application was submitted successfully.";

    }catch(PDOException $error){
        $_SESSION['application_validity'] = "You have already applied.";
    }
}
else {
    $_SESSION['application_validity'] = "You need to log in first.";
}
    

echo $_SESSION['application_validity'];
//header("location: ../views/page.php");