<?php
include "../../connect.php";
$data = json_decode(file_get_contents('php://input'), true);

$newform_type = $data['form_typeName'];


$stmt = $con->prepare("INSERT INTO `form_type` (`document`) VALUES ('" . $newform_type . "')");
$query = $stmt->execute();

if ($query) {
    echo json_encode("success");
} else {
    echo json_encode("erorr");
}
