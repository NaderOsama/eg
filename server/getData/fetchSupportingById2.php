<?php
include "../connect.php";
$key = $_GET['key'];

$stmt = $con->prepare("SELECT * FROM `supporting_documents` WHERE `id` = $key");
$query = $stmt->execute();
$approval = $stmt->fetch(PDO::FETCH_ASSOC);

if ($query) {
    echo json_encode($approval);
} else {
    echo json_encode("error");
}
