<?php
session_start();
$conn = require_once('../connector/connect.php');
$searchResult = $_POST['searchResult'];
$query = "SELECT * FROM joblisting WHERE employerid = (SELECT employerid FROM employer WHERE companyName = :companyName)";
$statement = $conn->prepare($query);
try {
    $statement->execute(['companyName' => $searchResult]);
} catch (PDOException $e) {
    var_dump($e);
}
$results = $statement->fetchAll();
$_SESSION['results'] = $results;
$_SESSION['companyName'] = $searchResult;
require('../views/index.php');
