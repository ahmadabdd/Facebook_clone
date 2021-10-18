<?php
include "connection.php";
session_start();

if(isset($_POST["full_name"]) && $_POST["full_name"] != "" && strlen($_POST["full_name"]) >= 3) {
    $full_name = $_POST["full_name"];
}else{
    die ("Enter a valid name");
}

if(isset($_POST["email"]) && $_POST["email"] != "" && strlen($_POST["email"]) >= 6) {
    $email = $_POST["email"];
}else{
    die ("Enter a valid email");
}

if(isset($_POST["phone"]) && $_POST["phone"] != "" && strlen($_POST["email"]) >= 6) {
    $phone = $_POST["phone"];
}else{
    die ("Enter a valid phone number");
}

if(isset($_POST["password"]) && $_POST["password"] != "" ) {
    $password = $_POST["password"];
}else{
    die ("Enter a valid password");
}

if(isset($_POST["confirm_password"]) && $_POST["confirm_password"] != "" ) {
    $confirm_password = $_POST["confirm_password"];
}else{
    die ("Enter a valid password confirmation");
}

print_r($_POST);
$sql1="Select * from users where email = ?";
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s", $email);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

$hash = hash('sha256', $password);

if(empty($row)) {
    if($password == $confirm_password) {
        $sql2 = "INSERT INTO `users` (`full_name`, `email`, `phone`, `password`) VALUES (?, ?, ?, ?);"; #add the new user to the database
        $stmt2 = $connection->prepare($sql2);
        $stmt2->bind_param("ssss", $full_name, $email, $phone, $hash);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        header("location: ../login.php");
    } else {
        $_SESSION["password"] = "Passwords do not match.";
        header('location: ../register.php');
    }
} else {
    $_SESSION["email"] = "This email is already used.";
    header('location: ../register.php');
} if($password != $confirm_password) {
    $_SESSION["password"] = "Passwords do not match.";
    header('location: ../register.php');
}
?>