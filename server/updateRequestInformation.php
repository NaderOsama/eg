<?php
    include "connect.php";

    $request_id = $_GET["request_id"];
    $data = json_decode(file_get_contents('php://input'), true);

    $companyName = $data['companyName'];
    $companyType = $data['companyType'];
    $companyTaxNumber = $data['companyTaxNumber'];
    $requestDetails = $data['request_details'];

    $stmt = $con->prepare ("UPDATE `request_information` SET `request_status` = '".$request_type."', `request_date` = '".$request_date."', `request_type` = '".$request_status."', `customer_id` = '".$requester."', `request_status_date` = '".$requestStatusDate."', `company_name` = '".$companyName."', `company_type` = '".$companyType."', `company_tax_number` = '".$companyTaxNumber."', `request_details` = '".$requestDetails."', `active` = '1' WHERE `request_id` = '".$request_id."'");
    $query = $stmt->execute();
    if($query){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }
    // echo json_encode("success");
?>