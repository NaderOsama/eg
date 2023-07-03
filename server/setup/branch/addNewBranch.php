<?php
include "../../connect.php";
$data = json_decode(file_get_contents('php://input'), true);

$newbranchLoc = $data['branchLoc'];
$newbranchName = $data['branchName'];

$stmt = $con->prepare("INSERT INTO `branch` (`location`,`company`) VALUES ('" . $newbranchLoc . "', '" . $newbranchName . "')");
$query = $stmt->execute();

if ($query) {
    echo json_encode("success");
} else {
    echo json_encode("erorr");
}
