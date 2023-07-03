<?php
include "../connect.php";
$key = $_GET['key'];

$stmt = $con->prepare("SELECT * FROM sub_services WHERE `id` = '".$key."'");
$query = $stmt->execute();
$subService = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($subService);
}else {
    echo json_encode("error");
}
?>