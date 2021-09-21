<?php

include "connection.php";
session_start();
$user_id = $_POST["user_id"];

$sql1 = "SELECT * 
         FROM notifications n 
         WHERE n.user_id = ?"; 
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s", $user_id);
$stmt1->execute();
$result = $stmt1->get_result();

$notifications_array = [];
while($row = $result->fetch_assoc()){
    $notifications_array[] = $row;  
}

$notifications_array_json = json_encode($notifications_array);
echo $notifications_array_json;
?>
