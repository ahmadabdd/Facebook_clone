<?php
include "connection.php";
session_start();
$user_full_name = $_SESSION['full_name'];
$user_id = $_SESSION["user_id"];
$friend_id = $_POST['friend_id'];

$text = $user_full_name . " accepted your friend request";
$status = 1;

                                                            //recives notification
$sql2 = "UPDATE `connections` SET status = ? WHERE user_id = ? and friend_id = ?;"; 
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("sss", $status, $user_id, $friend_id);
$stmt2->execute();


$sql = "INSERT INTO `connections`(`user_id`, `friend_id`, `status`) 
         VALUES (?, ?, ?);"; 
$stmt = $connection->prepare($sql);
$stmt->bind_param("sss", $friend_id, $user_id, $status);
$stmt->execute();


$sql = "INSERT INTO `notifications` (`user_id`, `text`) 
         VALUES (?, ?);"; 
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $friend_id, $text);
$stmt->execute();

$accepted_response = [];
$accepted_response['response'] = 'ok';


$accepted_response_json = json_encode($accepted_response);
echo $accepted_response_json;
?>