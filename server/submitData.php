<?php
    include "connect.php";

    $request_id = $_GET["request_id"];
    $data = json_decode(file_get_contents('php://input'), true);

    //request_information
    $request_status = $data["request_status"]; // جديد
    $request_date = $data["request_date"];
    $service_type = $data["service_type"];
    $request_type = $data["request_type"]; // تحت التعديل

    $stmt = $con->prepare ("UPDATE `request_information` SET `request_status` = '".$request_type."', `request_date` = '".$request_date."', `service_type` = '".$service_type."', `request_type` = '".$request_status."', `active` = '1', `stage` = 'مرحلة 2' WHERE `request_id` = '".$request_id."'");
    $query = $stmt->execute();
    if($query){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

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
    $first_suggestion_ar   = $data["first_suggestion_ar"];
    $second_suggestion_ar  = $data["second_suggestion_ar"];
    $third_suggestion_ar = $data["third_suggestion_ar"];
    $forth_suggestion_ar = $data["forth_suggestion_ar"];
    $fifth_suggestion_ar  = $data["fifth_suggestion_ar"];
    $first_suggestion_el  = $data["first_suggestion_el"];
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
    $country_mb   = $data["country_mb"];
    $city_mb  = $data["city_mb"];
    $company_phone_mb = $data["company_phone_mb"];
    $detailed_address_mb = $data["detailed_address_mb"];
    $country_wb  = $data["country_wb"];
    $city_wb  = $data["city_wb"];
    $company_phone_wb = $data["company_phone_wb"];
    $detailed_address_wb = $data["detailed_address_wb"];
    $country_ah = $data["country_ah"];
    $city_ah = $data["city_ah"];
    $company_phone_ah = $data["company_phone_ah"];
    $detailed_address_ah = $data["detailed_address_ah"];

    $stmt4 = $con->prepare ("UPDATE `company_address` SET `country_mb` = '".$country_mb."', `city_mb` = '".$city_mb."', `company_phone_mb` = '".$company_phone_mb."', `detailed_address_mb` = '".$detailed_address_mb."',`country_wb` = '".$country_wb."',
     `city_wb` = '".$city_wb."', `company_phone_wb` = '".$company_phone_wb."', `detailed_address_wb` = '".$detailed_address_wb."',`country_ah` = '".$country_ah."', `city_ah` = '".$city_ah."',`company_phone_ah` = '".$company_phone_ah."', `detailed_address_ah` = '".$detailed_address_ah."' WHERE `request_id` = '".$request_id."'");
    $query4 = $stmt4->execute();
    if($query4){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

    //activities_table
    //   $company_purpose  = $data["company_purpose"];
    //   $sub_sector  = $data["sub_sector"];
    //   $activity = $data["activity"];
    //   $activity_description = $data["activity_description"];
    //   $activity_exceptions = $data["activity_exceptions"];
  
    //   $stmt5 = $con->prepare ("UPDATE `activites_table` SET `company_purpose` = '".$company_purpose."', `sub_sector` = '".$sub_sector."', `activity` = '".$activity."', `activity_description` = '".$activity_description."', `activity_exceptions` = '".$activity_exceptions."' WHERE `request_id` = '".$request_id."'");
    //   $query5 = $stmt5->execute();
    //   if($query5){
    //       echo json_encode("success");
    //   }else {
    //       echo json_encode("erorr");
    //   }

    //capital_data
    $capital_currency   = $data["capital_currency"];
    $capital_amount  = $data["capital_amount"];
    $capital_tallyingup = $data["capital_tallyingup"];
    $authorized_capital = $data["authorized_capital"];
    $authorized_capital_tallyingup  = $data["authorized_capital_tallyingup"];
    $paidup_per_capital  = $data["paidup_per_capital"];
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

    //shareholder_data
    // $shareholder_type   = $data["shareholder_type"];
    // $shareholder_name  = $data["shareholder_name"];
    // $shareholder_status = $data["shareholder_status"];
    // $shareholder_nationality = $data["shareholder_nationality"];
    // $shareholder_address  = $data["shareholder_address"];
    // $founder_cash_shares_num  = $data["founder_cash_shares_num"];
    // $founder_inkind_shares_num = $data["founder_inkind_shares_num"];
    // $founder_preferred_shares_num = $data["founder_preferred_shares_num"];
    // $subscriber_cash_shares_num = $data["subscriber_cash_shares_num"];
    // $subscriber_inkind_shares_num   = $data["subscriber_inkind_shares_num"];
    // $subscriber_preferred_shares_num  = $data["subscriber_preferred_shares_num"];
    // $currency = $data["currency"];
    // $shareholder_phone = $data["shareholder_phone"];
    // $shareholder_fax  = $data["shareholder_fax"];
    // $shareholder_director  = $data["shareholder_director"];
    // $shareholder_identity_type = $data["shareholder_identity_type"];
    // $shareholder_identity_num = $data["shareholder_identity_num"];
    // $shareholder_date_of_birth = $data["shareholder_date_of_birth"];
    // $shareholder_gendre = $data["shareholder_gendre"];
    
    // $stmt7 = $con->prepare ("UPDATE `shareholder_data` SET `shareholder_type` = '".$shareholder_type."', `shareholder_name` = '".$shareholder_name."', `shareholder_status` = '".$shareholder_status."', `shareholder_nationality` = '".$shareholder_nationality."',`shareholder_address` = '".$shareholder_address."',
    //  `founder_cash_shares_num` = '".$founder_cash_shares_num."', `founder_inkind_shares_num` = '".$founder_inkind_shares_num."', `founder_preferred_shares_num` = '".$founder_preferred_shares_num."',`subscriber_cash_shares_num` = '".$subscriber_cash_shares_num."',`subscriber_inkind_shares_num` = '".$subscriber_inkind_shares_num."',`subscriber_preferred_shares_num` = '".$subscriber_preferred_shares_num."',`currency` = '".$currency."',`shareholder_phone` = '".$shareholder_phone."',`shareholder_fax` = '".$shareholder_fax."',`shareholder_director` = '".$shareholder_director."',`shareholder_identity_type` = '".$shareholder_identity_type."',`shareholder_identity_num` = '".$shareholder_identity_num."',`shareholder_date_of_birth` = '".$shareholder_date_of_birth."',`shareholder_gendre` = '".$shareholder_gendre."' WHERE `request_id` = '".$request_id."'");
    // $query7 = $stmt7->execute();
    // if($query7){
    //     echo json_encode("success");
    // }else {
    //     echo json_encode("erorr");
    // }

    //board_of_directors
    // $board_of_directors_name   = $data["board_of_directors_name"];
    // $board_of_directors_email  = $data["board_of_directors_email"];
    // $board_of_directors_nationaility = $data["board_of_directors_nationaility"];
    // $board_of_directors_identity_type = $data["board_of_directors_identity_type"];
    // $board_of_directors_gendre  = $data["board_of_directors_gendre"];
    // $board_of_directors_date_of_birth  = $data["board_of_directors_date_of_birth"];
    // $director_position = $data["director_position"];
    // $director_address = $data["director_address"];
    // $director_specialization = $data["director_specialization"];
    
    // $stmt8 = $con->prepare ("UPDATE `board_of_directors` SET `board_of_directors_name` = '".$board_of_directors_name."', `board_of_directors_email` = '".$board_of_directors_email."', `board_of_directors_nationaility` = '".$board_of_directors_nationaility."', `board_of_directors_identity_type` = '".$board_of_directors_identity_type."',`board_of_directors_gendre` = '".$board_of_directors_gendre."',
    //  `board_of_directors_date_of_birth` = '".$board_of_directors_date_of_birth."', `director_position` = '".$director_position."', `director_address` = '".$director_address."',`director_specialization` = '".$director_specialization."' WHERE `request_id` = '".$request_id."'");
    // $query8 = $stmt8->execute();
    // if($query8){
    //     echo json_encode("success");
    // }else {
    //     echo json_encode("erorr");
    // }

    //legal_counsel
    $counsel_name   = $data["counsel_name"];
    $counsel_address = $data["counsel_address"];
    $counsel_phone = $data["counsel_phone"];
    $counsel_identity_type = $data["counsel_identity_type"];
    $counsel_identity_num  = $data["counsel_identity_num"];
    $counsel_gender  = $data["counsel_gender"];
    $degree_of_enrollment = $data["degree_of_enrollment"];
    
    $stmt9 = $con->prepare ("UPDATE `legal_counsel` SET `counsel_name` = '".$counsel_name."', `counsel_address` = '".$counsel_address."', `counsel_phone` = '".$counsel_phone."', `counsel_identity_type` = '".$counsel_identity_type."',`counsel_identity_num` = '".$counsel_identity_num."',
     `counsel_gender` = '".$counsel_gender."', `degree_of_enrollment` = '".$degree_of_enrollment."' WHERE `request_id` = '".$request_id."'");
    $query9 = $stmt9->execute();
    if($query9){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

    //founding_agent
    // $founding_agent_name  = $data["founding_agent_name"];
    // $founding_agent_email = $data["founding_agent_email"];
    // $founding_agent_nationality = $data["founding_agent_nationality"];
    // $founding_agent_identity_type = $data["founding_agent_identity_type"];
    // $founding_agent_identity_num = $data["founding_agent_identity_num"];
    // $founding_agent_gender = $data["founding_agent_gender"];
    // $founding_agent_date_of_birth = $data["founding_agent_date_of_birth"];
    // $founding_agent_address = $data["founding_agent_address"];
    // $founding_agent_phone = $data["founding_agent_phone"];
    // $founding_agent_fax = $data["founding_agent_fax"];
    // $authorization_to = $data["authorization_to"];
    // $authorization_num = $data["authorization_num"];
    // $authorization_date = $data["authorization_date"];
    
    // $stmt10 = $con->prepare ("UPDATE `founding_agent` SET `founding_agent_name` = '".$founding_agent_name."', `founding_agent_email` = '".$founding_agent_email."', `founding_agent_nationality` = '".$founding_agent_nationality."', `founding_agent_identity_type` = '".$founding_agent_identity_type."',`founding_agent_identity_num` = '".$founding_agent_identity_num."',
    //  `founding_agent_gender` = '".$founding_agent_gender."', `founding_agent_date_of_birth` = '".$founding_agent_date_of_birth."', `founding_agent_address` = '".$founding_agent_address."',`founding_agent_phone` = '".$founding_agent_phone."',`founding_agent_fax` = '".$founding_agent_fax."',`authorization_to` = '".$authorization_to."',`authorization_num` = '".$authorization_num."',`authorization_date` = '".$authorization_date."' WHERE `request_id` = '".$request_id."'");
    // $query10 = $stmt10->execute();
    // if($query10){
    //     echo json_encode("success");
    // }else {
    //     echo json_encode("erorr");
    // }

    // //data_of_pycrt
    // $data_of_pycrt_name  = $data["data_of_pycrt_name"];
    // $data_of_pycrt_email = $data["data_of_pycrt_email"];
    // $data_of_pycrt_phone = $data["data_of_pycrt_phone"];
    // $data_of_pycrt_fax = $data["data_of_pycrt_fax"];
    
    // $stmt11 = $con->prepare ("UPDATE `data_of_pycrt` SET `data_of_pycrt_name` = '".$data_of_pycrt_name."', `data_of_pycrt_email` = '".$data_of_pycrt_email."', `data_of_pycrt_phone` = '".$data_of_pycrt_phone."', `data_of_pycrt_fax` = '".$data_of_pycrt_fax."' WHERE `request_id` = '".$request_id."'");
    // $query11 = $stmt11->execute();
    // if($query11){
    //     echo json_encode("success");
    // }else {
    //     echo json_encode("erorr");
    // }

    // //pre_establishment_data
    // $certificate_num  = $data["certificate_num"];
    // $certificate_date = $data["certificate_date"];
    // $bank_name = $data["bank_name"];
    // $bank_branch_name = $data["bank_branch_name"];
    // $account_num = $data["account_num"];
    // $paid_percentage_of_the_capital = $data["paid_percentage_of_the_capital"];
    
    // $stmt12 = $con->prepare ("UPDATE `pre-establishment_data` SET `certificate_num` = '".$certificate_num."', `certificate_date` = '".$certificate_date."', `bank_name` = '".$bank_name."', `bank_branch_name` = '".$bank_branch_name."', `account_num` = '".$account_num."', `paid_percentage_of_the_capital` = '".$paid_percentage_of_the_capital."' WHERE `request_id` = '".$request_id."'");
    // $query12 = $stmt12->execute();
    // if($query12){
    //     echo json_encode("success");
    // }else {
    //     echo json_encode("erorr");
    // }

    $stmt13 = $con->prepare ("INSERT INTO `requests` (`request_id`) 
            VALUES ('".$request_id."')");
             $query13 = $stmt13->execute();
             if($query13){
                echo json_encode("Done");
            }else {
                echo json_encode("erorr");
            }

    echo "<script>window.close();</script>";
?>