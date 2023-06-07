<?php
if (isset($_POST['submit'])) {
    session_start();
    require_once('../connector/connect.php');

    $jtitle = $_POST['job_title'];
    $jdescription = $_POST['job_description'];
    $jtype = $_POST['job_type'];
    $salary = $_POST['salary'];
    $cprofile = $_POST['company_profile'];
    $deadline = $_POST['deadline'];
    $employerid =  $_SESSION['userid'];

    $query = "INSERT INTO joblisting (job_description, job_type, job_title, salary, company_profile, application_deadline, employerid) 
    VALUES ('$jdescription', '$jtype', '$jtitle', '$salary', '$cprofile', '$deadline', '$employerid')";

    $response = mysqli_query($dbc, $query);
    if ($response)
        header("Location:success.php");
    else
        echo mysqli_error($dbc);
}
