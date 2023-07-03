<?php
include "../../connect.php";
$response = array();

$stmt = $con->prepare("SELECT * FROM sub_services");
$query = $stmt->execute();

if ($query) {
    header('Content-type: JSON');
    $i = 0;
    while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $response[$i] = $requestData;
        $i++;
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    echo json_encode("error");
}