<?php
include "../../connect.php";
$data = json_decode(file_get_contents('php://input'), true);

$newStatus = $data['statusName'];


$stmt = $con->prepare("INSERT INTO `status` (`name`) VALUES ('" . $newStatus . "')");
$query = $stmt->execute();

if ($query) {
    echo json_encode("success");
} else {
    echo json_encode("erorr");
}
