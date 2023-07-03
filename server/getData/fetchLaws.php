<?php
include "../connect.php";

$response = array();

$stmt = $con->prepare("SELECT * FROM law");
$query = $stmt->execute();

if($query){
    header('Content-type: JSON');
    $i=0;
    while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $response[$i]['id'] = $requestData['id'];
        $response[$i]['law_no'] = $requestData['law_no'];
        $response[$i]['law_name'] = $requestData['law_name'];
        $i++;
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
}else {
    echo json_encode("error");
}
?>