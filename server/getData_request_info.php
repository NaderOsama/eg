<?php
    include "connect.php";

    $request_id = $_GET["request_id"];
    $response = array();
    header('Content-type: JSON');
    $i=0;

    $stmt = $con->prepare("SELECT * FROM request_information WHERE request_id = '".$request_id."' ");
    $query = $stmt->execute();
    // $requestData = $stmt->fetch(PDO::FETCH_ASSOC);

    if($query){
        while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $response[$i]['request_id'] = $requestData['request_id'];
            $response[$i]['assigned_date'] = $requestData['assigned_date'];
            $response[$i]['mainService'] = $requestData['mainService'];
            $response[$i]['subService'] = $requestData['subService'];
            $response[$i]['assigned_department'] = $requestData['assigned_department'];
            $response[$i]['assigned_to'] = $requestData['assigned_to'];
            $response[$i]['customer_id'] = $requestData['customer_id'];
            $response[$i]['customer_type'] = $requestData['customer_type'];
            $response[$i]['request_date'] = $requestData['request_date'];
            $response[$i]['request_registrar'] = $requestData['request_registrar'];
            $response[$i]['request_status'] = $requestData['request_status'];
            $response[$i]['request_type'] = $requestData['request_type'];
            $response[$i]['stage'] = $requestData['stage'];
            $response[$i]['request_status_date'] = $requestData['request_status_date'];
            $response[$i]['company_name'] = $requestData['company_name'];
            $response[$i]['company_type'] = $requestData['company_type'];
            $response[$i]['company_tax_number'] = $requestData['company_tax_number'];
            $response[$i]['request_details'] = $requestData['request_details'];
            $i++;
        }
    }else {
        echo json_encode("error1");
    }
        
    $stmt2 = $con->prepare("SELECT CustomerName, CustomerPhone, CustomerEmail, CustomerNationality, CustomerAddress, CustomerIdType, CustomerNationalId, CustomerIdAttachment FROM customer WHERE CustomerId = '".$response[$i-1]['customer_id']."' ");
    $query2 = $stmt2->execute();
    
    if($query2){
        while ($requestData2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $response[$i]['CustomerName'] = $requestData2['CustomerName'];
            $response[$i]['CustomerPhone'] = $requestData2['CustomerPhone'];
            $response[$i]['CustomerEmail'] = $requestData2['CustomerEmail'];
            $response[$i]['CustomerNationality'] = $requestData2['CustomerNationality'];
            $response[$i]['CustomerAddress'] = $requestData2['CustomerAddress'];
            $response[$i]['CustomerIdType'] = $requestData2['CustomerIdType'];
            $response[$i]['CustomerNationalId'] = $requestData2['CustomerNationalId'];
            $response[$i]['CustomerIdAttachment'] = $requestData2['CustomerIdAttachment'];
            $i++;
        }
    }else {
        echo json_encode("error2");
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
?>