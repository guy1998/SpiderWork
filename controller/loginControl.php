<?php

session_start();

$connect = require_once "../connector/connect.php";

if(isset($_POST['username']) && isset($_POST['password'])){
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
    if ($person['password'] == $password) {
        $_SESSION['userid'] = $person['userid'];
        $seeker_query = "SELECT userid FROM jobseeker WHERE userid=:userid";
        $statement3 = $connect->prepare($seeker_query);

        try {

            $statement3->execute(['userid' => $_SESSION['userid']]);
        } catch (PDOException $error) {
            var_dump($error);
        }

        $check = $statement3->fetch();
        $_SESSION['user_type'] = 'seeker';
        header("Location: ../views/jobseeker.php");
    } else {
        $log_in_errors['error'] = "Wrong password";
        require_once "../views/log-in.php";
    }
} else if ($emp) {
    if ($emp['password'] == $password) {
        $_SESSION['userid'] = $emp['employerId'];
        $_SESSION['user_type'] = 'employer';
        header("Location: ../views/employer.php");
    } else {
        $log_in_errors['error'] = "Wrong password";
        require_once "../views/log-in.php";
    }
} else {
    $log_in_errors['error'] = "It seems this user exits!";
    require_once "../views/log-in.php";
}

}