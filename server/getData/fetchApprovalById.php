<?php
include "../connect.php";
$key = $_GET['key'];

$stmt = $con->prepare("SELECT * FROM request_work_orders WHERE id = $key");
$query = $stmt->execute();
$approval = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($approval);
}else {
    echo json_encode("error");
}
?>