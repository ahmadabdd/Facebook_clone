<?php

include "connection.php";
session_start();
$user_id = $_POST["user_id"];
$status = 1;

$sql1 = "SELECT u.* FROM users u, connections c 
         WHERE c.user_id = ? 
         and c.status = ? 
         and u.id = c.friend_id;"; 
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss", $user_id, $status);
$stmt1->execute();
$result = $stmt1->get_result();

$list_friends = [];
while($row = $result->fetch_assoc()){
    $list_friends[] = $row; 
}

$list_friends_json = json_encode($list_friends);
echo $list_friends_json;
?>