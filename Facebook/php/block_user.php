<?php
include "connection.php";
session_start();

$user_full_name = $_SESSION['full_name'];
$user_id = $_SESSION["user_id"];
$friend_id = $_POST['friend_id'];

$text = $user_full_name . " blocked you";
$status = 3;
        


$sql2 = "INSERT INTO `connections` (`user_id`, `friend_id`, `status`) 
         VALUES (?, ?, ?);"; 
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("sss", $user_id, $friend_id, $status);
$stmt2->execute();
$result = $stmt2->get_result();



$sql2 = "INSERT INTO `notifications` (`user_id`, `text`) 
         VALUES (?, ?);"; 
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("ss", $friend_id, $text);
$stmt2->execute();

$block_response = [];
$block_response['response'] = 'ok';

$block_response_json = json_encode($block_response);
echo $block_response_json;
?>