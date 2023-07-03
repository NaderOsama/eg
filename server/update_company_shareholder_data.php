<?php
    include "connect.php";

    //shareholder_data
    $num_of_s_id = $_GET["num_of_s_id"];
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
    $shareholder_director  = $_GET["shareholder_director"];
    $shareholder_identity_type = $_GET["shareholder_identity_type"];
    $shareholder_identity_num = $_GET["shareholder_identity_num"];
    $shareholder_date_of_birth = $_GET["shareholder_date_of_birth"];
    $shareholder_gendre = $_GET["shareholder_gendre"];
    $board_of_director_type = $_GET["board_of_director_type"];
    $board_of_director_address = $_GET["board_of_director_address"];
    $board_of_director_speciality = $_GET["board_of_director_speciality"];
    $stmt7 = $con->prepare ("UPDATE `shareholder_data` SET `shareholder_type` = '".$shareholder_type."', `shareholder_name` = '".$shareholder_name."', `shareholder_status` = '".$shareholder_status."', `shareholder_nationality` = '".$shareholder_nationality."',`shareholder_address` = '".$shareholder_address."',
     `founder_cash_shares_num` = '".$founder_cash_shares_num."', `founder_inkind_shares_num` = '".$founder_inkind_shares_num."', `founder_preferred_shares_num` = '".$founder_preferred_shares_num."',`subscriber_cash_shares_num` = '".$subscriber_cash_shares_num."',`subscriber_inkind_shares_num` = '".$subscriber_inkind_shares_num."',`subscriber_preferred_shares_num` = '".$subscriber_preferred_shares_num."',`currency` = '".$currency."',`shareholder_phone` = '".$shareholder_phone."',`shareholder_fax` = '".$shareholder_fax."',`shareholder_director` = '".$shareholder_director."',`shareholder_identity_type` = '".$shareholder_identity_type."',`shareholder_identity_num` = '".$shareholder_identity_num."',`shareholder_date_of_birth` = '".$shareholder_date_of_birth."',`shareholder_gendre` = '".$shareholder_gendre."',`board_of_director_type` = '".$board_of_director_type."', `board_of_director_address` = '".$board_of_director_address."', `board_of_director_speciality` = '".$board_of_director_speciality."' WHERE `num_of_s_id` = '".$num_of_s_id."'");
    $query7 = $stmt7->execute();
    if($query7){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

?>