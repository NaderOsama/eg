<?php
include "../connect.php";
$request_id = $_GET["request_id"];
$response = array();

$stmt = $con->prepare("SELECT * FROM request_information WHERE request_id = '" . $request_id . "' ");
$query = $stmt->execute();

if ($query) {
    header('Content-type: JSON');
    $i = 0;
    while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $response[$i]['request_id'] = $requestData['request_id'];
        $response[$i]['request_status'] = $requestData['request_status'];
        $response[$i]['request_date'] = $requestData['request_date'];
        $response[$i]['request_type'] = $requestData['request_type'];
        // $response[$i]['customer_id'] = $requestData['customer_id'];
        $response[$i]['stage'] = $requestData['stage'];
        $response[$i]['client_name'] = $requestData['client_name'];
        $response[$i]['client_email'] = $requestData['client_email'];
        $response[$i]['client_phone_no'] = $requestData['client_phone_no'];
        $response[$i]['request_registrar'] = $requestData['request_registrar'];
        $response[$i]['assigned_to'] = $requestData['assigned_to'];
        $response[$i]['assigned_date'] = $requestData['assigned_date'];
        $response[$i]['assigned_department'] = $requestData['assigned_department'];
        $response[$i]['request_status_date'] = $requestData['request_status_date'];
        $response[$i]['mainService'] = $requestData['mainService'];
        $response[$i]['subService'] = $requestData['subService'];
        $response[$i]['company_name'] = $requestData['company_name'];
        // $response[$i]['company_type'] = $requestData['company_type'];
        $response[$i]['entity'] = $requestData['entity'];
        $response[$i]['law'] = $requestData['law'];
        $response[$i]['legalform'] = $requestData['legalform'];

        $response[$i]['company_tax_number'] = $requestData['company_tax_number'];
        $response[$i]['request_details'] = $requestData['request_details'];
        $response[$i]['communicationChannel'] = $requestData['communicationChannel'];
        $i++;
    }
    // $stmt2 = $con->prepare("SELECT CustomerName, CustomerPhone, CustomerEmail FROM customer WHERE CustomerId = '".$response[$i-1]['customer_id']."' ");
    // $query2 = $stmt2->execute();
    // while ($requestData2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    //     $response[$i]['CustomerName'] = $requestData2['CustomerName'];
    //     $response[$i]['CustomerPhone'] = $requestData2['CustomerPhone'];
    //     $response[$i]['CustomerEmail'] = $requestData2['CustomerEmail'];
    //     $i++;
    // }
    $stmt3 = $con->prepare("SELECT user_name_ar, department_id, roles FROM user WHERE `user-id` = '" . $response[$i - 1]['request_registrar'] . "' ");
    $query3 = $stmt3->execute();
    while ($requestData3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
        $response[$i]['user_name_ar'] = $requestData3['user_name_ar'];
        $response[$i]['roles'] = $requestData3['roles'];
        $response[$i]['department_id'] = $requestData3['department_id'];
        $i++;
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    echo json_encode("error");
}
