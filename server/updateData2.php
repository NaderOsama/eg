<?php
    include "connect.php";

    $request_id = $_GET["request_id"];

    //request_information
    $request_status = $_GET["request_status"]; // جديد
    $request_date = $_GET["request_date"];
    $service_type = $_GET["service_type"];
    $request_type = $_GET["request_type"]; // تحت التعديل

    $stmt = $con->prepare ("UPDATE `request_information` SET `request_status` = '".$request_type."', `request_date` = '".$request_date."', `service_type` = '".$service_type."', `request_type` = '".$request_status."', `active` = '1' WHERE `request_id` = '".$request_id."'");
    $query = $stmt->execute();
    if($query){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

    //legal_structures
    $law  = $_GET["law"];
    if ($law == 'law72') {
        $law = 72;
    }elseif ($law == 'law159') {
        $law = 159;
    }
    $legalstructures  = $_GET["legalstructures"];
    $incorporation = $_GET["incorporation"];
    $nature_inv = $_GET["nature_inv"];

    $stmt2 = $con->prepare ("UPDATE `legal_structures` SET `law` = '".$law."', `legalstructures` = '".$legalstructures."', `incorporation` = '".$incorporation."', `nature-inv` = '".$nature_inv."' WHERE `request_id` = '".$request_id."'");
    $query2 = $stmt2->execute();
    if($query2){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

    //company_name
    $first_suggestion_ar   = $_GET["first_suggestion_ar"];
    $second_suggestion_ar  = $_GET["second_suggestion_ar"];
    $third_suggestion_ar = $_GET["third_suggestion_ar"];
    $forth_suggestion_ar = $_GET["forth_suggestion_ar"];
    $fifth_suggestion_ar  = $_GET["fifth_suggestion_ar"];
    $first_suggestion_el  = $_GET["first_suggestion_el"];
    $second_suggestion_el = $_GET["second_suggestion_el"];
    $third_suggestion_el = $_GET["third_suggestion_el"];
    $forth_suggestion_el = $_GET["forth_suggestion_el"];
    $fifth_suggestion_el = $_GET["fifth_suggestion_el"];

    $stmt3 = $con->prepare ("UPDATE `company_name` SET `first-suggestion-ar` = '".$first_suggestion_ar."', `second-suggestion-ar` = '".$second_suggestion_ar."', `third-suggestion-ar` = '".$third_suggestion_ar."', `forth-suggestion-ar` = '".$forth_suggestion_ar."',`fifth-suggestion-ar` ='".$fifth_suggestion_ar."',
     `first-suggestion-el` = '".$first_suggestion_el."', `second-suggestion-el` = '".$second_suggestion_el."', `third-suggestion-el` = '".$third_suggestion_el."',`forth-suggestion-el` = '".$forth_suggestion_el."', `fifth-suggestion-el` = '".$fifth_suggestion_el."'  WHERE `request_id` = '".$request_id."'");
    $query3 = $stmt3->execute();
    if($query3){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

    //company_address
    $country_mb   = $_GET["country_mb"];
    $city_mb  = $_GET["city_mb"];
    $company_phone_mb = $_GET["company_phone_mb"];
    $detailed_address_mb = $_GET["detailed_address_mb"];
    $country_wb  = $_GET["country_wb"];
    $city_wb  = $_GET["city_wb"];
    $company_phone_wb = $_GET["company_phone_wb"];
    $detailed_address_wb = $_GET["detailed_address_wb"];
    $country_ah = $_GET["country_ah"];
    $city_ah = $_GET["city_ah"];
    $company_phone_ah = $_GET["company_phone_ah"];
    $detailed_address_ah = $_GET["detailed_address_ah"];

    $stmt4 = $con->prepare ("UPDATE `company_address` SET `country-mb` = '".$country_mb."', `city-mb` = '".$city_mb."', `company-phone-mb` = '".$company_phone_mb."', `detailed-address-mb` = '".$detailed_address_mb."',`country-wb` = '".$country_wb."',
     `city-wb` = '".$city_wb."', `company-phone-wb` = '".$company_phone_wb."', `detailed-address-wb` = '".$detailed_address_wb."',`country-ah` = '".$country_ah."', `city-ah` = '".$city_ah."',`company-phone-ah` = '".$company_phone_ah."', `detailed-address-ah` = '".$detailed_address_ah."' WHERE `request_id` = '".$request_id."'");
    $query4 = $stmt4->execute();
    if($query4){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

    //activities_table
      $company_purpose  = $_GET["company_purpose"];
      $sub_sector  = $_GET["sub_sector"];
      $activity = $_GET["activity"];
      $activity_description = $_GET["activity_description"];
      $activity_exceptions = $_GET["activity_exceptions"];
  
      $stmt5 = $con->prepare ("UPDATE `activites_table` SET `company_purpose` = '".$company_purpose."', `sub_sector` = '".$sub_sector."', `activity` = '".$activity."', `activity_description` = '".$activity_description."', `activity_exceptions` = '".$activity_exceptions."' WHERE `request_id` = '".$request_id."'");
      $query5 = $stmt5->execute();
      if($query5){
          echo json_encode("success");
      }else {
          echo json_encode("erorr");
      }

    //capital_data
    $capital_currency   = $_GET["capital_currency"];
    $capital_amount  = $_GET["capital_amount"];
    $capital_tallyingup = $_GET["capital_tallyingup"];
    $authorized_capital = $_GET["authorized_capital"];
    $authorized_capital_tallyingup  = $_GET["authorized_capital_tallyingup"];
    $paidup_per_capital  = $_GET["paidup_per_capital"];
    $num_shares = $_GET["num_shares"];
    $share_value = $_GET["share_value"];
    $company_period = $_GET["company_period"];
    
    $stmt6 = $con->prepare ("UPDATE `capital_data` SET `capital_currency` = '".$capital_currency."', `capital_amount` = '".$capital_amount."', `capital_tallyingup` = '".$capital_tallyingup."', `authorized_capital` = '".$authorized_capital."',`authorized_capital_tallyingup` = '".$authorized_capital_tallyingup."',
     `paidup_per_capital` = '".$paidup_per_capital."', `num_shares` = '".$num_shares."', `share_value` = '".$share_value."',`company_period` = '".$company_period."' WHERE `request_id` = '".$request_id."'");
    $query6 = $stmt6->execute();
    if($query6){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

    //shareholder_data
    $shareholder_type   = $_GET["shareholder_type"];
    $shareholder_name  = $_GET["shareholder_name"];
    $shareholder_status = $_GET["shareholder_status"];
    $shareholder_nationality = $_GET["shareholder_nationality"];
    $shareholder_address  = $_GET["shareholder_address"];
    $founder_cash_shares_num  = $_GET["founder_cash_shares_num"];
    $founder_inkind_shares_num = $_GET["founder_inkind_shares_num"];
    $founder_preferred_shares_num = $_GET["founder_preferred_shares_num"];
    $subscriber_cash_shares_num = $_GET["subscriber_cash_shares_num"];
    $subscriber_inkind_shares_num   = $_GET["subscriber_inkind_shares_num"];
    $subscriber_preferred_shares_num  = $_GET["subscriber_preferred_shares_num"];
    $currency = $_GET["currency"];
    $shareholder_phone = $_GET["shareholder_phone"];
    $shareholder_fax  = $_GET["shareholder_fax"];
    $director  = $_GET["director"];
    $identity_type = $_GET["identity_type"];
    $identity_num = $_GET["identity_num"];
    $date_of_birth = $_GET["date_of_birth"];
    $gendre = $_GET["gendre"];
    
    $stmt7 = $con->prepare ("UPDATE `shareholder_data` SET `shareholder_type` = '".$shareholder_type."', `shareholder_name` = '".$shareholder_name."', `shareholder_status` = '".$shareholder_status."', `shareholder_nationality` = '".$shareholder_nationality."',`shareholder_address` = '".$shareholder_address."',
     `founder_cash_shares_num` = '".$founder_cash_shares_num."', `founder_inkind_shares_num` = '".$founder_inkind_shares_num."', `founder_preferred_shares_num` = '".$founder_preferred_shares_num."',`subscriber_cash_shares_num` = '".$subscriber_cash_shares_num."',`subscriber_inkind_shares_num` = '".$subscriber_inkind_shares_num."',`subscriber_preferred_shares_num` = '".$subscriber_preferred_shares_num."',`currency` = '".$currency."',`shareholder_phone` = '".$shareholder_phone."',`shareholder_fax` = '".$shareholder_fax."',`director` = '".$director."',`identity_type` = '".$identity_type."',`identity_num` = '".$identity_num."',`date_of_birth` = '".$date_of_birth."',`gendre` = '".$gendre."' WHERE `request_id` = '".$request_id."'");
    $query7 = $stmt7->execute();
    if($query7){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

    echo "<script>window.close();</script>";
?>