<?php
include "../../connect.php";
$data = json_decode(file_get_contents('php://input'), true);

$newcompany_types = $data['company_typesName'];


$stmt = $con->prepare("INSERT INTO `company_types` (`name`) VALUES ('" . $newcompany_types . "')");
$query = $stmt->execute();

if ($query) {
    echo json_encode("success");
} else {
    echo json_encode("erorr");
}
