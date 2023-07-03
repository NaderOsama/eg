<?php 
    include "connect.php";

    $request_id = $_GET["request_id"];
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

     $stmt = $con->prepare ("INSERT INTO `number_of_shareholder` (`request_id`) 
     VALUES ('".$request_id."')");
     $query = $stmt->execute();
     $find_num_of_shareholder_id = $con->prepare("SELECT num_of_shareholder_id from number_of_shareholder ORDER BY num_of_shareholder_id DESC LIMIT 1;");
     $query2 = $find_num_of_shareholder_id->execute();
     $num_of_shareholder_id = $find_num_of_shareholder_id->fetch(PDO::FETCH_ASSOC);

     $stmt2 = $con->prepare ("INSERT INTO `shareholder_data` (`num_of_s_id`, `shareholder_type`, `shareholder_name`, `shareholder_status`, `shareholder_nationality`, `shareholder_address`, `founder_cash_shares_num`, `founder_inkind_shares_num`, `founder_preferred_shares_num`,`subscriber_cash_shares_num`, `subscriber_inkind_shares_num`, `subscriber_preferred_shares_num`, `currency`, `shareholder_phone`, `shareholder_fax`, `shareholder_director`, `shareholder_identity_type`, `shareholder_identity_num`, `shareholder_date_of_birth`, `shareholder_gendre`, `board_of_director_type`, `board_of_director_address`, `board_of_director_speciality`) 
     VALUES ('".$num_of_shareholder_id["num_of_shareholder_id"]."','".$shareholder_type."','".$shareholder_name."','".$shareholder_status."','".$shareholder_nationality."','".$shareholder_address."','".$founder_cash_shares_num."','".$founder_inkind_shares_num."','".$founder_preferred_shares_num."','".$subscriber_cash_shares_num."','".$subscriber_inkind_shares_num."','".$subscriber_preferred_shares_num."','".$currency."','".$shareholder_phone."','".$shareholder_fax."','".$shareholder_director."','".$shareholder_identity_type."','".$shareholder_identity_num."','".$shareholder_date_of_birth."','".$shareholder_gendre."','".$board_of_director_type."','".$board_of_director_address."','".$board_of_director_speciality."') ");
     $query3 = $stmt2->execute();

     if($query3){
        echo json_encode("Done");
    }else {
        echo json_encode("erorr");
    }
?>