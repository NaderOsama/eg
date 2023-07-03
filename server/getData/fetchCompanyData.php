<?php
include "../connect.php";

$response = array();
$companyId = $_GET['id'];
$stmt = $con->prepare("SELECT company_name, company_type FROM company_data WHERE id = '".$companyId."'");
$query = $stmt->execute();

if($query){
    header('Content-type: JSON');
    $i=0;
    while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $response[$i]['company_name'] = $requestData['company_name'];
        $response[$i]['company_type'] = $requestData['company_type'];
        $i++;
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
}else {
    echo json_encode("error");
}
?>