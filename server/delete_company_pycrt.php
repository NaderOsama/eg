<?php 
    include "connect.php";

    $request_id = $_GET["request_id"];
    $number_of_pycrt_id = $_GET["number_of_pycrt_id"];

  $stmt = $con->prepare ("UPDATE `number_of_pycrt` SET `active` = '"."d"."' WHERE `request_id` = '".$request_id."' AND `number_of_pycrt_id` = '".$number_of_pycrt_id."'");
    $query = $stmt->execute();
    if($query){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }
?>