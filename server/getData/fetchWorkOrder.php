<?php
include "../connect.php";
$key = $_GET['key'];

$stmt = $con->prepare("SELECT * FROM `work_orders` WHERE id = $key");
$query = $stmt->execute();
$workOrder = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($workOrder);
}else {
    echo json_encode("error");
}
?>