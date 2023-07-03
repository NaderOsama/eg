<?php
include "../connect.php";

$response = array();
$id = $_GET['reqNo'];

$stmt = $con->prepare("SELECT `request_status` FROM `request_information` WHERE request_id = '".$id."'");
$query = $stmt->execute();
$request_status = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($request_status);
}else {
    echo json_encode("error");
}
?>