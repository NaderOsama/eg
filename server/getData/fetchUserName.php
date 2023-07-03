<?php
include "../connect.php";

$userKey = $_GET['key'];

$response = array();

$stmt = $con->prepare("SELECT user_name_ar FROM user WHERE `user-id` = $userKey");
$query = $stmt->execute();
$requestData = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($requestData);
}else {
    echo json_encode("error");
}
?>