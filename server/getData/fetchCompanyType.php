<?php
include "../connect.php";

$response = array();
$companyType = $_GET['companyType'];
$stmt = $con->prepare("SELECT id, sub_service_name FROM sub_service WHERE service_type = '".$companyType."'");
$query = $stmt->execute();

if($query){
    header('Content-type: JSON');
    $i=0;
    while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $response[$i]['id'] = $requestData['id'];
        $response[$i]['sub_service_name'] = $requestData['sub_service_name'];
        $i++;
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
}else {
    echo json_encode("error");
}
?>