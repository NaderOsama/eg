<?php
include "../connect.php";
$key = $_GET['key'];

$stmt = $con->prepare("SELECT * FROM `request_information` WHERE request_id = $key");
$query = $stmt->execute();
$requestInfo = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($requestInfo);
}else {
    echo json_encode("error");
}
?>