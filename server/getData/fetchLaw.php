<?php
include "../connect.php";
header('Content-type: application/json');
$response = array();

$stmt = $con->prepare("SELECT * FROM law");
$query = $stmt->execute();

if ($query) {
    $i = 0;
    while ($law = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $response[$i]['id'] = $law['id'];
        $response[$i]['name'] = $law['law_name'];
        $i++;
    }
} else {
    $response['error'] = "Failed to fetch law data.";
}

echo json_encode($response);
