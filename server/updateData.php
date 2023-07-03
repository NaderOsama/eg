<?php
    include "connect.php";

    $request_id = $_GET["request_id"];
    $data = json_decode(file_get_contents('php://input'), true);

    // //request_information
    // $request_status = $data["request_status"]; // جديد
    // $request_date = $data["request_date"];
    // $service_type = $data["service_type"];
    // $request_type = $data["request_type"]; // تحت التعديل

    // $stmt = $con->prepare ("UPDATE `request_information` SET `request_status` = '".$request_type."', `request_date` = '".$request_date."', `service_type` = '".$service_type."', `request_type` = '".$request_status."', `active` = '1' WHERE `request_id` = '".$request_id."'");
    // $query = $stmt->execute();
    // if($query){
    //     echo json_encode("success");
    // }else {
    //     echo json_encode("erorr");
    // }

    //legal_structures
    $law  = $data["law"];
    if ($law == 'law72') {
        $law = 72;
    }elseif ($law == 'law159') {
        $law = 159;
    }
    $legalstructures  = $data["legalstructures"];
    $incorporation = $data["incorporation"];
    $nature_inv = $data["nature_inv"];

    $stmt2 = $con->prepare ("UPDATE `legal_structures` SET `law` = '".$law."', `legalstructures` = '".$legalstructures."', `incorporation` = '".$incorporation."', `nature_inv` = '".$nature_inv."' WHERE `request_id` = '".$request_id."'");
    $query2 = $stmt2->execute();
    if($query2){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }


    //company_name
    $first_suggestion_ar = $data["first_suggestion_ar"];
    $second_suggestion_ar = $data["second_suggestion_ar"];
    $third_suggestion_ar = $data["third_suggestion_ar"];
    $forth_suggestion_ar = $data["forth_suggestion_ar"];
    $fifth_suggestion_ar = $data["fifth_suggestion_ar"];
    $first_suggestion_el = $data["first_suggestion_el"];
    $second_suggestion_el = $data["second_suggestion_el"];
    $third_suggestion_el = $data["third_suggestion_el"];
    $forth_suggestion_el = $data["forth_suggestion_el"];
    $fifth_suggestion_el = $data["fifth_suggestion_el"];

    $stmt3 = $con->prepare ("UPDATE `company_name` SET `first_suggestion_ar` = '".$first_suggestion_ar."', `second_suggestion_ar` = '".$second_suggestion_ar."', `third_suggestion_ar` = '".$third_suggestion_ar."', `forth_suggestion_ar` = '".$forth_suggestion_ar."',`fifth_suggestion_ar` ='".$fifth_suggestion_ar."',
     `first_suggestion_el` = '".$first_suggestion_el."', `second_suggestion_el` = '".$second_suggestion_el."', `third_suggestion_el` = '".$third_suggestion_el."',`forth_suggestion_el` = '".$forth_suggestion_el."', `fifth_suggestion_el` = '".$fifth_suggestion_el."'  WHERE `request_id` = '".$request_id."'");
    $query3 = $stmt3->execute();
    if($query3){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

    //company_address
    $country_mb = $data["country_mb"];
    $city_mb = $data["city_mb"];
    $company_phone_mb = $data["company_phone_mb"];
    $detailed_address_mb = $data["detailed_address_mb"];
    $country_wb = $data["country_wb"];
    $city_wb = $data["city_wb"];
    $company_phone_wb = $data["company_phone_wb"];
    $detailed_address_wb = $data["detailed_address_wb"];
    $wbNotExist = $data["wbNotExist"];
    $country_ah = $data["country_ah"];
    $city_ah = $data["city_ah"];
    $company_phone_ah = $data["company_phone_ah"];
    $detailed_address_ah = $data["detailed_address_ah"];
    $ahNotExist = $data["ahNotExist"];

    $stmt4 = $con->prepare ("UPDATE `company_address` SET `country_mb` = '".$country_mb."', `city_mb` = '".$city_mb."', `company_phone_mb` = '".$company_phone_mb."', `detailed_address_mb` = '".$detailed_address_mb."',`country_wb` = '".$country_wb."',
     `city_wb` = '".$city_wb."', `company_phone_wb` = '".$company_phone_wb."', `detailed_address_wb` = '".$detailed_address_wb."', `wb_not_exist` = '".$wbNotExist."', `country_ah` = '".$country_ah."', `city_ah` = '".$city_ah."',`company_phone_ah` = '".$company_phone_ah."', `detailed_address_ah` = '".$detailed_address_ah."', `ah_not_exist` = '".$ahNotExist."' WHERE `request_id` = '".$request_id."'");
    $query4 = $stmt4->execute();
    if($query4){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

    //capital_data
    $capital_currency = $data["capital_currency"];
    $capital_amount  = $data["capital_amount"];
    $capital_tallyingup = $data["capital_tallyingup"];
    $authorized_capital = $data["authorized_capital"];
    $authorized_capital_tallyingup = $data["authorized_capital_tallyingup"];
    $paidup_per_capital = $data["paidup_per_capital"];
    $num_shares = $data["num_shares"];
    $share_value = $data["share_value"];
    $company_period = $data["company_period"];
    
    $stmt6 = $con->prepare ("UPDATE `capital_data` SET `capital_currency` = '".$capital_currency."', `capital_amount` = '".$capital_amount."', `capital_tallyingup` = '".$capital_tallyingup."', `authorized_capital` = '".$authorized_capital."',`authorized_capital_tallyingup` = '".$authorized_capital_tallyingup."',
     `paidup_per_capital` = '".$paidup_per_capital."', `num_shares` = '".$num_shares."', `share_value` = '".$share_value."',`company_period` = '".$company_period."' WHERE `request_id` = '".$request_id."'");
    $query6 = $stmt6->execute();
    if($query6){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

    //companyAuditor
    $auditorName = $data["auditorName"];
    $auditorAddress = $data["auditorAddress"];
    $auditorRegistrationNumber = $data["auditorRegistrationNumber"];
    $auditorPhone = $data["auditorPhone"];
    $auditorCertificate  = $data["auditorCertificate"];
    $auditorAttachmentType = $data["auditorAttachmentType"];
    
    $stmt7 = $con->prepare ("UPDATE `company_auditor` SET `auditor_name` = '".$auditorName."', `auditor_address` = '".$auditorAddress."', `auditor_registration_number` = '".$auditorRegistrationNumber."', `auditor_phone` = '".$auditorPhone."',`auditor_certificate` = '".$auditorCertificate."',
     `auditor_attachment_type` = '".$auditorAttachmentType."' WHERE `request_id` = '".$request_id."'");
    $query7 = $stmt7->execute();
    if($query7){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

    //legal_counsel
    $counsel_name = $data["counsel_name"];
    $counsel_address = $data["counsel_address"];
    $counsel_phone = $data["counsel_phone"];
    $counsel_identity_type = $data["counsel_identity_type"];
    $counsel_identity_num  = $data["counsel_identity_num"];
    $counsel_gender = $data["counsel_gender"];
    $degree_of_enrollment = $data["degree_of_enrollment"];
    
    $stmt9 = $con->prepare ("UPDATE `legal_counsel` SET `counsel_name` = '".$counsel_name."', `counsel_address` = '".$counsel_address."', `counsel_phone` = '".$counsel_phone."', `counsel_identity_type` = '".$counsel_identity_type."',`counsel_identity_num` = '".$counsel_identity_num."',
     `counsel_gender` = '".$counsel_gender."', `degree_of_enrollment` = '".$degree_of_enrollment."' WHERE `request_id` = '".$request_id."'");
    $query9 = $stmt9->execute();
    if($query9){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

    //pre_establishment_data
    $certificate_num = $data["certificate_num"];
    $certificate_date = $data["certificate_date"];
    $bank_name = $data["bank_name"];
    $bank_branch_name = $data["bank_branch_name"];
    $account_num = $data["account_num"];
    $paid_percentage_of_the_capital = $data["paid_percentage_of_the_capital"];
    
    $stmt12 = $con->prepare ("UPDATE `pre_establishment_data` SET `certificate_num` = '".$certificate_num."', `certificate_date` = '".$certificate_date."', `bank_name` = '".$bank_name."', `bank_branch_name` = '".$bank_branch_name."', `account_num` = '".$account_num."', `paid_percentage_of_the_capital` = '".$paid_percentage_of_the_capital."' WHERE `request_id` = '".$request_id."'");
    $query12 = $stmt12->execute();
    if($query12){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

    // echo "<script>window.close();</script>";
?>