<?php
include "connection.php";
session_start();

// Validatiting credentials.
if(isset($_POST["email"]) and $_POST["email"] !="") {
	$email = $_POST["email"];
} else { 
	die("Enter a valid email.");
}

if(isset($_POST["password"]) and $_POST["password"] !="") {
	$password = $_POST["password"];
} else {
	die("Enter a valid password.");
}

$hash = hash('sha256', $password);

$sql1="Select * from users where email = ?";
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s", $email);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)) {
	$_SESSION['email'] = "Please try again with another email.";
	header("location: ../login.php");
} else {
	if($hash === $row['password']) {
		$_SESSION['email'] = $row['email'];
		$_SESSION['full_name'] = $row['full_name'];
		$_SESSION['phone'] = $row['phone'];
		$_SESSION['user_id'] = $row['id'];
		header("location: ../views/index.php");
	} else {
		$_SESSION['password'] = "Incorrect Password.";
		header("location: ../login.php");
	}
}
?>



