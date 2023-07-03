<?php 
    include "connect.php";

    $request_id = $_GET["request_id"];
    $num_of_shareholder_id = $_GET[" 	num_of_shareholder_id"];

  $stmt = $con->prepare ("UPDATE `number_of_shareholder` SET `active` = '"."d"."' WHERE `request_id` = '".$request_id."' AND `num_of_shareholder_id` = '".$num_of_shareholder_id."'");
    $query = $stmt->execute();
    if($query){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }
?>