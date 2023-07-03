<?php
include "../connect.php";

$ruleset_id = $_GET['ruleset_id'];

$response = array();

$stmt = $con->prepare("SELECT id, ruleset_details FROM ruleset_details WHERE ruleset_id = $ruleset_id");
$query = $stmt->execute();

if($query){
    header('Content-type: JSON');
    $i=0;
    while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $response[$i]['id'] = $requestData['id'];
        $response[$i]['ruleset_details'] = $requestData['ruleset_details'];
        $i++;
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
}else {
    echo json_encode("error");
}
?>