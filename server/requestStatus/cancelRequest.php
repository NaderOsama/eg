<?php
include "../connect.php";
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
$department = $_SESSION['department'];
$request_id = $_GET['request_id'];

$stmt = $con->prepare ("UPDATE `request_information` SET `request_status` = 'ملغي' WHERE request_id = $request_id");
$query = $stmt->execute();

$stmt2 = $con->prepare("INSERT INTO `request_status_log` (`request_id`, `status`, `status_date`, `responsible`, `department`) 
VALUES ($request_id, 5, '".(new DateTime())->format('Y-m-d')."', $user_id, $department)");
$query2 = $stmt2->execute();


if($query2){
    echo json_encode("success");
}else {
    echo json_encode("error");
}
?>