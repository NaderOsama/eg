<?php
include "../connect.php";

$id = $_GET['key'];

$response = array();

$stmt = $con->prepare("SELECT * FROM work_orders_log WHERE work_order_id = $id");
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