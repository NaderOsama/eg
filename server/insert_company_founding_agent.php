<?php 
    include "connect.php";

    $request_id = $_GET["request_id"];
    $founding_agent_name  = $_GET["founding_agent_name"];
    $founding_agent_email = $_GET["founding_agent_email"];
    $founding_agent_nationality = $_GET["founding_agent_nationality"];
    $founding_agent_identity_type = $_GET["founding_agent_identity_type"];
    $founding_agent_identity_num = $_GET["founding_agent_identity_num"];
    $founding_agent_gender = $_GET["founding_agent_gender"];
    $founding_agent_date_of_birth = $_GET["founding_agent_date_of_birth"];
    $founding_agent_address = $_GET["founding_agent_address"];
    $founding_agent_phone = $_GET["founding_agent_phone"];
    $founding_agent_fax = $_GET["founding_agent_fax"];
    $authorization_to = $_GET["authorization_to"];
    $authorization_num = $_GET["authorization_num"];
    $authorization_date = $_GET["authorization_date"];

     $stmt = $con->prepare ("INSERT INTO `number_of_founding_agent` (`request_id`) 
     VALUES ('".$request_id."')");
     $query = $stmt->execute();
     $find_number_of_founding_agent_id = $con->prepare("SELECT number_of_founding_agent_id from number_of_founding_agent ORDER BY number_of_founding_agent_id DESC LIMIT 1;");
     $query2 = $find_number_of_founding_agent_id->execute();
     $number_of_founding_agent_id = $find_number_of_founding_agent_id->fetch(PDO::FETCH_ASSOC);

     $stmt2 = $con->prepare ("INSERT INTO `founding_agent` (`num_fa_id`, `founding_agent_name`, `founding_agent_email`, `founding_agent_nationality`, `founding_agent_identity_type`, `founding_agent_identity_num`, `founding_agent_gender`,`founding_agent_date_of_birth`,`founding_agent_address`,`founding_agent_phone`,`founding_agent_fax`,`authorization_to`,`authorization_num`,`authorization_date`) 
     VALUES ('".$number_of_founding_agent_id["number_of_founding_agent_id"]."','".$founding_agent_name."','".$founding_agent_email."','".$founding_agent_nationality."','".$founding_agent_identity_type."','".$founding_agent_identity_num."','".$founding_agent_gender."','".$founding_agent_date_of_birth."','".$founding_agent_address."','".$founding_agent_phone."','".$founding_agent_fax."','".$authorization_to."','".$authorization_num."','".$authorization_date."') ");
     $query3 = $stmt2->execute();

     if($query3){
        echo json_encode("Done");
    }else {
        echo json_encode("erorr");
    }
?>