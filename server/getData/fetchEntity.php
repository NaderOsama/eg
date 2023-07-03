<?php
include "../connect.php";
header('Content-type: JSON');
$response = array();
$i = 0;

$stmt = $con->prepare("SELECT * FROM entity");
$query = $stmt->execute();

while ($mainServices = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $response[$i]['id'] = $mainServices['id'];
    $response[$i]['entity_name'] = $mainServices['entity_name'];
    $i++;
}

if ($query) {
    echo json_encode($response);
} else {
    echo json_encode("error");
}
