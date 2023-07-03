<?php
    include "connect.php";

    //founding_agent
    $num_fa_id  = $_GET["num_fa_id"];
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
    
    $stmt10 = $con->prepare ("UPDATE `founding_agent` SET `founding_agent_name` = '".$founding_agent_name."', `founding_agent_email` = '".$founding_agent_email."', `founding_agent_nationality` = '".$founding_agent_nationality."', `founding_agent_identity_type` = '".$founding_agent_identity_type."',`founding_agent_identity_num` = '".$founding_agent_identity_num."',
     `founding_agent_gender` = '".$founding_agent_gender."', `founding_agent_date_of_birth` = '".$founding_agent_date_of_birth."', `founding_agent_address` = '".$founding_agent_address."',`founding_agent_phone` = '".$founding_agent_phone."',`founding_agent_fax` = '".$founding_agent_fax."',`authorization_to` = '".$authorization_to."',`authorization_num` = '".$authorization_num."',`authorization_date` = '".$authorization_date."' WHERE `num_fa_id` = '".$num_fa_id."'");
    $query10 = $stmt10->execute();
    if($query10){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }
?>