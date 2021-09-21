<?php
include "connection.php";
session_start();

$user_full_name = $_SESSION['full_name'];
$user_id = $_SESSION["user_id"];
$friend_id = $_POST['blocked_id'];
$text = $user_full_name . " unblocked you";


$sql2 = "DELETE FROM connections 
         WHERE user_id = ?
         AND friend_id = ?;"; 
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("ss", $user_id, $friend_id);
$stmt2->execute();
$result = $stmt2->get_result();


$sql2 = "INSERT INTO `notifications` (`user_id`, `text`) 
         VALUES (?, ?);"; 
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("ss", $friend_id, $text);
$stmt2->execute();

$unblock_response = [];
$unblock_response['response'] = 'ok';

$unblock_response_json = json_encode($unblock_response);
echo $unblock_response_json;
?>