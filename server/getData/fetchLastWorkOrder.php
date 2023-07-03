<?php
include "../connect.php";
$key = $_GET['key'];

$stmt = $con->prepare("SELECT * FROM `work_orders` WHERE `request_approval_id` = '".$key."' ORDER BY `id` DESC LIMIT 1");
$query = $stmt->execute();
$work_order = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($work_order);
}else {
    echo json_encode("error");
}
?>