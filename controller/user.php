<?php

session_start();
$connection = require_once "../connector/connect.php"; //getting database connection
// Validate and sanitize input data
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$surname = isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : '';
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';
$birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : "";

// if (preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
//     // Username is valid
// } else {
//     // Username is invalid
// }
//username validation

if (empty($name)) {
    echo "Name is empty.";
}

if (empty($surname)) {
    echo "Surname is empty.";
}

if (empty($email)) {
    echo "Email is empty.";
}

if (empty($birthday)) {
    echo "Birthday is empty.";
}

if (empty($username)) {
    echo "Username is empty.";
}

if (empty($password)) {
    echo "Password is empty.";
}

$sql = "INSERT INTO person (name, surname, email, username, password, birthday, profilepic) VALUES (:name, :surname, :email, :username, :password, :birthday, '../images/defaultUser.png')";
$experience = "Employer: ".$_POST['empName']."\nWorked for: ".$_POST['years']." years\nDescription: ".$_POST['jobDesc'];
$education = "University: ".$_POST['school'];

$sql2 = "INSERT INTO JobSeeker VALUES ((SELECT COUNT(*) FROM Person), :field, :experience, :education, 'default')";
$sql3 = "INSERT INTO phone_numbers VALUES (SELECT COUNT(*) FROM person), :phone";

$statement=$connection->prepare($sql);
$statement2 = $connection->prepare($sql2);
$statement3 = $connection->prepare($sql3);

try {
    $statement->execute([
        'name' => $name,
        'surname' => $surname,
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'birthday' => $birthday
    ]);

    $statement2->execute([
        'field' => $_POST['field'],
        'experience' => $experience,
        'education' => $education
    ]);

    $statement3->execute([
        'phone'=>$phone
    ]);


} catch (PDOException $error) {
    var_dump($error);
}

$sql4 = "SELECT userid FROM person WHERE username = :username";
$statement4 = $connection->prepare($sql3);
try{
    $statement4->execute(['username' => $username]);
}catch (PDOException $error) {
    var_dump($error);
}

$result = $statement4->fetchAll();
$_SESSION['userid'] = $result[0]['userid'];

header("Location: ../views/jobseeker.php");