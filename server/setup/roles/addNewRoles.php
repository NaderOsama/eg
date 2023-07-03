<?php
include "../../connect.php";
$data = json_decode(file_get_contents('php://input'), true);

$newroles = $data['rolesName'];


$stmt = $con->prepare("INSERT INTO `roles` (`name`) VALUES ('" . $newroles . "')");
$query = $stmt->execute();

if ($query) {
    echo json_encode("success");
} else {
    echo json_encode("erorr");
}
