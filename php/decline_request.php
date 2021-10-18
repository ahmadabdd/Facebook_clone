<?php
include "connection.php";
session_start();

$user_id = $_SESSION["user_id"];
$user_full_name = $_SESSION['full_name'];
$friend_id = $_POST['friend_id'];

$text = $user_full_name . " declined your friend request";


$sql2 = "DELETE FROM `connections` WHERE user_id = ? and friend_id = ?;"; 
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("ss", $user_id, $friend_id);
$stmt2->execute();
$result = $stmt2->get_result();


$sql = "INSERT INTO `notifications` (`user_id`, `text`) 
         VALUES (?, ?);"; 
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $friend_id, $text);
$stmt->execute();

$decline_response = [];
$decline_response['response'] = 'ok';

$decline_response_json = json_encode($decline_response);
echo $decline_response_json;
?>