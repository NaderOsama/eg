<?php 
    include "connect.php";

    $request_id = $_GET["request_id"];
    $activity_id = $_GET["activity_id"];

  $stmt = $con->prepare ("UPDATE `activity` SET `active` = '"."d"."' WHERE `request_id` = '".$request_id."' AND `activity_id` = '".$activity_id."'");
    $query = $stmt->execute();
    if($query){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }
?>