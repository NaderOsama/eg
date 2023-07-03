<?php
include "../connect.php";
$branch_key = $_GET['branch_key'];

$response = array();

$stmt = $con->prepare("SELECT `location` FROM branch WHERE `id` = $branch_key");
$query = $stmt->execute();
$requestData = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($requestData);
}else {
    echo json_encode("error");
}
?>