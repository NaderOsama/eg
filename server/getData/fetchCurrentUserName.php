<?php
include "../connect.php";
session_start();
$user_id = $_SESSION['user_id'];

$response = array();

$stmt = $con->prepare("SELECT user_name_ar, `user-id`, `roles`, `department_id`, `branch` FROM user WHERE `user-id` = $user_id");
$query = $stmt->execute();
$requestData = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($requestData);
}else {
    echo json_encode("error");
}
?>