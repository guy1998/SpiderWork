<?php

session_start();

$connect = require_once "../connector/connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM person WHERE username=:username";
$query_if_employer = "SELECT * FROM employer WHERE username=:username";

$statement1 = $connect->prepare($query);
$statement2 = $connect->prepare($query_if_employer);

try {
    $statement1->execute(['username' => $username]);
    $statement2->execute(['username' => $username]);
} catch (PDOException $error) {
    var_dump($error);
}

$log_in_errors = [];
$person = $statement1->fetch();
$emp = $statement2->fetch();
if ($person) {
    echo "Hello person";
    if ($person['password'] == $password) {
        $_SESSION['userid'] = $person['userid'];
        $_SESSION['user_type'] = 'seeker';
        $seeker_query = "SELECT userid FROM jobseeker WHERE userid=:userid";
        $statement3 = $connect->prepare($seeker_query);

        try {

            $statement3->execute(['userid' => $_SESSION['userid']]);
        } catch (PDOException $error) {
            var_dump($error);
        }

        $check = $statement3->fetch();

        if ($check) {
            header("Location: ../views/jobseeker.php");
        } else {
            header("Location: ../views/recruiter.php");
        }
    } else {
        $log_in_errors['password'] = "Wrong password";
    }
} else if ($emp) {
    echo "Hello employer";
    if ($emp['password'] == $password) {
        $_SESSION['userid'] = $emp['employerId'];
        $_SESSION['user_type'] = 'employer';
        header("Location: ../views/employer.php");
    } else {
        $log_in_errors['password'] = "Wrong password";
    }
} else {
    header("Location: ../views/log-in.php");
}
