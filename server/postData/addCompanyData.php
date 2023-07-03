<?php
    include "../connect.php";
    
    $data = json_decode(file_get_contents('php://input'), true);
    $requestId = $data["request_id"];
    $companyName = $data['companyName'];
    $companyType = $data['companyType'];
    $companyTaxNumber = $data['companyTaxNumber'];
    $request_details = $data['request_details'];

    $stmt1 = $con->prepare ("INSERT INTO `company_data` (`request_id`,`company_name`,`company_type`,`company_tax_number`,`description`) 
    VALUES ('".$requestId."', '".$companyName."', '".$companyType."', '".$companyTaxNumber."', '".$request_details."')");
    $query = $stmt1->execute();

    if($query){
        echo json_encode("تم إنشاء شركة جديدة");
    }else {
        echo json_encode("حدث خطأ ما ولم يتم إنشاء شركة جديدة");
    }
?>