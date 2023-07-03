<?php
include "../connect.php";

$response = array();
$id = $_GET['id'];

$stmt = $con->prepare("SELECT `name` FROM `status` WHERE id = '".$id."'");
$query = $stmt->execute();
$name = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($name);
}else {
    echo json_encode("error");
}
?>