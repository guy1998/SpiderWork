<?php

include_once "../connector/connect.php";
$dbName = 'spiderwork';
$user = 'root';
$password = '';

function fetchUser($userid)
{

    $sql = "SELECT * FROM person WHERE userid = :userid";
    $connection = connect('spiderwork', 'root', '');

    $statement = $connection->prepare($sql);
    try {
        $statement->execute(['userid' => $userid]);
    } catch (PDOException $error) {
        var_dump($error);
    }

    $user = $statement->fetch();
    return $user;
}

function fetchSeeker($userid)
{
    $sql = "SELECT * FROM jobseeker WHERE userid = :userid";
    $connection = connect('spiderwork', 'root', '');

    $statement = $connection->prepare($sql);
    try {
        $statement->execute(['userid' => $userid]);
    } catch (PDOException $error) {
        var_dump($error);
    }

    $seeker = $statement->fetch();
    return $seeker;
}

function fetchRec($userid)
{
    $sql = "SELECT * FROM recruiter WHERE userid = :userid";
    $connection = connect('spiderwork', 'root', '');

    $statement = $connection->prepare($sql);
    try {
        $statement->execute(['userid' => $userid]);
    } catch (PDOException $error) {
        var_dump($error);
    }

    $recruiter = $statement->fetch();
    return $recruiter;
}

function fetchEmployer($employerid)
{

    $sql = "SELECT * FROM employer WHERE employerid = :employerid";
    $connection = connect('spiderwork', 'root', '');

    $statement = $connection->prepare($sql);
    try {
        $statement->execute(['employerid' => $employerid]);
    } catch (PDOException $error) {
        var_dump($error);
    }

    $emp = $statement->fetch();
    return $emp;
}

function checkIfExist($username1){
    $connection = connect('spiderwork', 'root', '');
    $sql = "SELECT * FROM employer WHERE username=:username";
    $sql2 = "SELECT * FROM person WHERE username=:username";
    $stmt = $connection->prepare($sql);
    $stmt2 = $connection->prepare($sql2);
    try{
        $stmt->execute(['username'=>$username1]);
        $stmt2->execute(['username'=>$username1]);
    }catch(PDOException $error){
        return false;
    }
    $outcome1 = $stmt->fetchAll();
    $outcome2 = $stmt2->fetchAll();

    if(empty($outcome1) && empty($outcome2)){
        return false;
    }
    
    return true;
}

