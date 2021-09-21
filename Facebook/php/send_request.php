<?php
include "connection.php";
session_start();

$user_full_name = $_SESSION['full_name'];
$user_id = $_POST["user_id"];
$friend_id = $_POST["friend_id"];
$text = $user_full_name . " sent you a friend request";
$status = 2;


$sql = "INSERT INTO `connections`(`user_id`, `friend_id`, `status`) 
         VALUES (?, ?, ?);"; 
$stmt = $connection->prepare($sql);
$stmt->bind_param("sss", $friend_id, $user_id, $status);
$stmt->execute();
$result = $stmt->get_result();


$sql2 = "INSERT INTO `notifications` (`user_id`, `text`) 
         VALUES (?, ?);"; 
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("ss", $friend_id, $text);
$stmt2->execute();

$request_sent = [];
$request_sent['response'] = 'ok';


$request_sent_json = json_encode($request_sent);
echo $request_sent_json;
?>