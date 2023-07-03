<?php
include "../../connect.php";
$data = json_decode(file_get_contents('php://input'), true);

$newsub_services = $data['newsub_services'];
$main_service2 = $data['main_service2'];


$stmt = $con->prepare("INSERT INTO `sub_services` (`name`,`main_service_id`) VALUES ('" . $newsub_services . "','" . $main_service2 . "')");
$query = $stmt->execute();

if ($query) {
    echo json_encode("success");
} else {
    echo json_encode("erorr");
}
