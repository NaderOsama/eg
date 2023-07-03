<?php
include "../connect.php";
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
$request_id = $_GET['request_id'];
$data = json_decode(file_get_contents('php://input'), true);
$newStateName = $data['newStateName'];
$newStateCode = $data['newStateCode'];
$newStateReason = $data['newStateReason'];
$department = $data['department'];

$stmt = $con->prepare ("UPDATE `request_information` SET `request_status` = '".$newStateName."' WHERE request_id = $request_id");
$query = $stmt->execute();

$stmt2 = $con->prepare("INSERT INTO `request_status_log` (`request_id`, `status`, `status_date`, `responsible`, `department`, `reason`) 
VALUES ($request_id, '".$newStateCode."', '".(new DateTime())->format('Y-m-d')."', $user_id, $department, '".$newStateReason."')");
$query2 = $stmt2->execute();


if($query2){
    echo json_encode("success");
}else {
    echo json_encode("error");
}
?>