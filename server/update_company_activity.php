<?php
    include "connect.php";

    $request_id = $_GET["request_id"];
    $data = json_decode(file_get_contents('php://input'), true);

      $company_purpose  = $data["company_purpose"];
      $sub_sector  = $data["sub_sector"];
      $activity = $data["activity"];
      $activity_description = $data["activity_description"];
    //   $activityApproval = $data["activityApproval"];
    //   $activity_exceptions = $data["activity_exceptions"];
      
    $getActivityId = $con->prepare ("SELECT `activity_id` FROM activity WHERE `request_id` = '".$request_id."'");
    $query = $getActivityId->execute();
    $getActivityId = $getActivityId->fetch(PDO::FETCH_ASSOC);

    $stmt = $con->prepare ("INSERT INTO `activites_table` (`activity_id`, `company_purpose`,`sub_sector`,`activity`,`activity_description`) 
    VALUES ('".$getActivityId['activity_id']."', '".$company_purpose."','".$sub_sector."','".$activity."','".$activity_description."')");
    $query = $stmt->execute();

    if($query){
        echo json_encode("Activity Added successfuly");
    }else {
        echo json_encode("erorr");
    }

  
?>