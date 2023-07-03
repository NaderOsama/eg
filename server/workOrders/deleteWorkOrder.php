<?php
include "../connect.php";
$key = $_GET['key'];

$stmt = $con->prepare('DELETE FROM `work_orders` WHERE request_approval_id = "'.$key.'"');
$stmt->execute();

$stmt1 = $con->prepare('DELETE FROM `request_work_orders` WHERE id = "'.$key.'"');
$query = $stmt1->execute();


if($query){
    echo json_encode('success');
}else{
    echo json_encode('failed');
}

?>