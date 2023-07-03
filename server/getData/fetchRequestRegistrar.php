<?php
include "../connect.php";

$request_id = $_GET['reqNo'];

$response = array();

$stmt = $con->prepare("SELECT `request_registrar` FROM `request_information` WHERE `request_id` = $request_id");
$query = $stmt->execute();
$requestData = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($requestData);
}else {
    echo json_encode("error");
}
?>