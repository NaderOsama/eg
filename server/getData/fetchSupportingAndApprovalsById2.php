<?php
include "../connect.php";
$key = $_GET['key'];

$stmt = $con->prepare("SELECT * FROM `supporting_and_approvals` WHERE `id` = $key");
$query = $stmt->execute();
$approval = $stmt->fetch(PDO::FETCH_ASSOC);

if ($query) {
    header('Content-Type: application/json');
    echo json_encode($approval);
} else {
    echo json_encode("error");
}
