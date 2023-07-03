<?php
include "../connect.php";
$key = $_GET['key'];

$stmt = $con->prepare("SELECT * FROM `request_supporting_documents` WHERE `id` = '".$key."'");
$query = $stmt->execute();
$work_order = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($work_order);
}else {
    echo json_encode("error");
}
?>