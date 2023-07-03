<?php
include "../connect.php";
$data = array();

$stmt = $con->prepare("SELECT id FROM request_supporting_documents ORDER BY id DESC LIMIT 1");
$query = $stmt->execute();
$requestData = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($requestData);
}else {
    echo json_encode("error");
}
?>