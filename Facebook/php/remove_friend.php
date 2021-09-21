<?php
include "connection.php";
session_start();

$user_full_name = $_SESSION['full_name'];
$user_id = $_POST["user_id"];
$friend_id = $_POST['friend_id'];

$text = $user_full_name . " removed you as a firend";


$sql0 = "DELETE FROM `connections` WHERE user_id = ? and friend_id = ?;"; 
$stmt0 = $connection->prepare($sql0);
$stmt0->bind_param("ss", $user_id, $friend_id);
$stmt0->execute();

$sql1 = "DELETE FROM `connections` WHERE user_id = ? and friend_id = ?;"; 
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss", $friend_id, $user_id);
$stmt1->execute();

$sql2 = "INSERT INTO `notifications` (`user_id`, `text`) 
         VALUES (?, ?);"; 
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("ss", $friend_id, $text);
$stmt2->execute();

$delete_response = [];
$delete_response['response'] = 'ok';

$delete_response_json = json_encode($delete_response);
echo $delete_response_json;
?>