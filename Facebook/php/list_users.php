<?php
include "connection.php";

session_start();
$user_id = $_POST['user_id'];
$search_value = $_POST['search_value'];

$name = "%" . $search_value . "%";


$sql1 = "SELECT DISTINCT u.*
         FROM users u
         WHERE (u.full_name LIKE '%a%' ) 
         AND u.id <> ? 
         AND u.id NOT in (SELECT c.friend_id
                          FROM connections c
                          WHERE c.user_id = ?
                          AND c.status = 1)
         AND u.id NOT in (SELECT c.user_id
                          FROM connections c
                          WHERE c.friend_id = ?
                          AND c.status = 1)
         AND u.id NOT in (SELECT c.friend_id
                          FROM connections c
                          WHERE c.user_id = ?
                          AND c.status = 2)
         AND u.id NOT in (SELECT c.user_id
                         FROM connections c
                         WHERE c.friend_id = ?
                         AND c.status = 2)
         AND u.id NOT in (SELECT c.friend_id
                         FROM connections c
                         WHERE c.user_id = ?
                         AND c.status = 3)
         AND u.id NOT in (SELECT c.user_id
                         FROM connections c
                         WHERE c.friend_id = ?
                         AND c.status = 3);"; 

$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("sssssss", $name, $user_id, $user_id, $user_id, $user_id, $user_id, $user_id);
$stmt1->execute();
$result = $stmt1->get_result();

$list_users = [];
while($row = $result->fetch_assoc()){
    $list_users[] = $row;
}

$list_users_json = json_encode($list_users);
echo $list_users_json;
?>