<?php
include "../connect.php";

$section_name = $_GET['section_name'];

$response = array();

$stmt = $con->prepare("SELECT * FROM rulesets WHERE section_name = $section_name");
$query = $stmt->execute();

if($query){
    header('Content-type: JSON');
    $i=0;
    while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $response[$i]['id'] = $requestData['id'];
        $response[$i]['section_name'] = $requestData['section_name'];
        $response[$i]['ruleset'] = $requestData['ruleset'];
        $i++;
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
}else {
    echo json_encode("error");
}
?>