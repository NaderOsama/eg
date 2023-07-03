<?php
include "../connect.php";
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
$user_privilege = $_SESSION['user_roles'];
$response = array();

$data = json_decode(file_get_contents('php://input'), true);
$request_id = $data['request_id'];
$newSupportingDoc = $data['newSupportingDoc'];
$newSupportingDocDesc = $data['newSupportingDocDesc'];
$newSupportingDocModelFile = $data['newSupportingDocModelFile'];
$newSupportingDocComment = $data['newSupportingDocComment'];



$stmt1 = $con->prepare("INSERT INTO `request_supporting_documents` (`request_id`,`supporting_document`,`description`,`responsible`,`status`, `added_date`, `model_sheet`, `added_by`, `comment`) 
    VALUES ('" . $request_id . "', '" . $newSupportingDoc . "', '" . $newSupportingDocDesc . "', '2', 'لم يبدأ', '" . (new DateTime())->format('Y-m-d') . "', '" . $newSupportingDocModelFile . "', '" . $user_id . "', '" . $newSupportingDocComment . "')");
$query = $stmt1->execute();

$response[0] = 'success';

$stmt = $con->prepare("SELECT id FROM request_supporting_documents WHERE `request_id` = $request_id ORDER BY id DESC LIMIT 1");
$query1 = $stmt->execute();
$requestData = $stmt->fetch(PDO::FETCH_ASSOC);

$response[1] = $requestData;

if ($query1) {
    // echo json_encode($tables_name[$i]);
    echo json_encode($response);
} else {
    echo json_encode("erorr");
}
