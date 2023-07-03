<?php
include "../connect.php";
header('Content-type: JSON');
$mainServiceId = $_GET['id'];
$response = array();
$i = 0;

$stmt = $con->prepare("SELECT * FROM legalform WHERE entity_id = '" . $mainServiceId . "'");
$query = $stmt->execute();

while ($subServices = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $response[$i]['id'] = $subServices['id'];
    $response[$i]['legal_form_name'] = $subServices['legal_form_name'];
    $i++;
}

if ($query) {
    echo json_encode($response);
} else {
    echo json_encode("error");
}
