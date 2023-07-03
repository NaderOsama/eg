<?php
    include "connect.php";

    $request_id = $_GET["request_id"];
    $data = json_decode(file_get_contents('php://input'), true);

    // $myObj->name = "John";
    // $myObj->age = 30;
    // $myObj->city = "New York";

    // $myJSON = json_encode($myObj);

    //request_information
    $mainService = $data['mainService'];
    $subService = $data['subService'];
    $companyType = $data['companyType'];
    // $request_status = $data["request_status"]; // جديد
    // $request_date = (new DateTime())->format('Y-m-d');
    // // $service_type = $data["service_type"];
    // $request_type = $data["request_type"]; // تحت التعديل
    // $requester = $data['Requester'];
    // // $applicantType =$data['applicantType'];
    // $requestStatusDate = (new DateTime())->format('Y-m-d');
    // $companyName = $data['companyName'];
    // $companyType = $data['companyType'];
    // $companyTaxNumber = $data['companyTaxNumber'];
    // $requestDetails = $data['request_details'];

    $stmt = $con->prepare ("UPDATE `request_information` SET `mainService` = '".$mainService."', `subService` = '".$subService."', `company_type` = '".$companyType."', `active` = '1' WHERE `request_id` = '".$request_id."'");
    $query = $stmt->execute();
    if($query){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }
    // echo json_encode("success");
?>