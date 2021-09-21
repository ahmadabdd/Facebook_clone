<?php
include "connection.php";
session_start();
$user_id = $_POST["user_id"];
$new_full_name = $_POST['full_name'];
$new_email = $_POST['email'];
$new_phone = $_POST['phone'];

$sql1 = "UPDATE `users` 
         SET `full_name`= ?,`email`= ?, `phone`= ? 
         WHERE id = ?;"; 
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ssss", $new_full_name, $new_email, $new_phone, $user_id);
$stmt1->execute();

$edit_response = [];
$edit_response['response'] = 'ok';
$edit_response['full_name'] = $new_full_name;
$edit_response['email'] = $new_email;
$edit_response['phone'] = $new_phone;

$edit_response_json = json_encode($edit_response);
echo $edit_response_json
?>
