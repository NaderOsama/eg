<?php
include "../connect.php";

$user_id = $_GET['id'];

$stmt = $con->prepare("SELECT user_name_ar FROM user WHERE `user-id` = $user_id");
$query = $stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($userData);
}else {
    echo json_encode("error");
}
?>