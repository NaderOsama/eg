<?php
include "../connect.php";
$data = array();
$request_id = $_GET['request_id'];

$stmt = $con->prepare("SELECT id FROM request_work_orders WHERE `request_id` = $request_id ORDER BY id DESC LIMIT 1");
$query = $stmt->execute();
$requestData = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($requestData);
}else {
    echo json_encode("error");
}
