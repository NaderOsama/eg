<?php
include "../connect.php";

$response = array();
$request_id = $_GET['request_id'];

$stmt = $con->prepare("SELECT * FROM request_status_log WHERE request_id = '".$request_id."'");
$query = $stmt->execute();

if($query){
    header('Content-type: JSON');
    $i=0;
    while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $response[$i] = $requestData;
        $i++;
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
}else {
    echo json_encode("error");
}
?>