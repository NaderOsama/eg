<?php
include "../../connect.php";
$data = json_decode(file_get_contents('php://input'), true);

$newMain_services = $data['main_servicesName'];


$stmt = $con->prepare("INSERT INTO `main_services` (`name`) VALUES ('" . $newMain_services . "')");
$query = $stmt->execute();

if ($query) {
    echo json_encode("success");
} else {
    echo json_encode("erorr");
}
