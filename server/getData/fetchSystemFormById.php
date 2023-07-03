<?php
include "../connect.php";
$key = $_GET['key'];

$stmt = $con->prepare("SELECT * FROM systemforms WHERE `TabID` = '" . $key . "'");
$query = $stmt->execute();
$mainService = $stmt->fetch(PDO::FETCH_ASSOC);

if ($query) {
    echo json_encode($mainService);
} else {
    echo json_encode("error");
}
