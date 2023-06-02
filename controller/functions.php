<?php

include "../connector/connect.php";
$dbName = 'spiderwork';
$user = 'root';
$password = 'Aldrin/117';

function fetchUser($userid){

    $sql = "SELECT * FROM person WHERE userid = :userid";
    $connection = connect('spiderwork', 'root', 'Aldrin/117');

    $statement = $connection->prepare($sql);
    try{
        $statement->execute(['userid'=>$userid]);
    }catch(PDOException $error){
        var_dump($error);
    }
    
    $user = $statement->fetch();
    return $user;
}

function fetchSeeker($userid){
    $sql = "SELECT * FROM jobseeker WHERE userid = :userid";
    $connection = connect('spiderwork', 'root', 'Aldrin/117');

    $statement = $connection->prepare($sql);
    try{
        $statement->execute(['userid'=>$userid]);
    }catch(PDOException $error){
        var_dump($error);
    }
    
    $seeker = $statement->fetch();
    return $seeker;
}

function fetchRec($userid){
    $sql = "SELECT * FROM recruiter WHERE userid = :userid";
    $connection = connect('spiderwork', 'root', 'Aldrin/117');

    $statement = $connection->prepare($sql);
    try{
        $statement->execute(['userid'=>$userid]);
    }catch(PDOException $error){
        var_dump($error);
    }
    
    $recruiter = $statement->fetch();
    return $recruiter;
}

function fetchEmployer($employerid){

    $sql = "SELECT * FROM employer WHERE employerid = :employerid";
    $connection = require_once "../connector/connect.php";

    $statement = $connection->prepare($sql);
    try{
        $statement->execute(['employerid'=>$employerid]);
    }catch(PDOException $error){
        var_dump($error);
    }

    $emp = $statement->fetch();
    return $emp;

}