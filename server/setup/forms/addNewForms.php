<?php
include "../../connect.php";
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
$user_privilege = $_SESSION['user_roles'];

$data = json_decode(file_get_contents('php://input'), true);

$newform_type = $data['newform_type'];
$newform_desc = $data['newform_desc'];
$newformURL = $data['newformURL'];
$newupdate_date = $data['newupdate_date'];

// Check that newformURL has a value
if (!isset($newformURL) || empty($newformURL)) {
    echo json_encode("error: newformURL is empty or undefined");
    exit;
}

$stmt = $con->prepare("INSERT INTO `forms` (`form_type`,`form_desc`,`formURL`,`responsible`,`update_date`) VALUES ('" . $newform_type . "', '" . $newform_desc . "', '" . $newformURL . "', '" . $user_id . "', '" . $newupdate_date . "')");
$query = $stmt->execute();

if ($query) {
    echo json_encode("success");
} else {
    echo json_encode("error: failed to insert data into forms table");
}
