<?php 
    include "connect.php";

    $request_id = $_GET["request_id"];
    $company_purpose = $_GET["company_purpose"];
    $sub_sector = $_GET["sub_sector"];
    $activity = $_GET["activity"];
    $activity_description = $_GET["activity_description"];
    $activityApproval = $_GET["activityApproval"];
    $activity_exceptions = $_GET["activity_exceptions"];

     $stmt = $con->prepare ("INSERT INTO `activity` (`request_id`) 
     VALUES ('".$request_id."')");
     $query = $stmt->execute();
     $find_activity_id = $con->prepare("SELECT activity_id from activity ORDER BY activity_id DESC LIMIT 1;");
     $query2 = $find_activity_id->execute();
     $activity_id = $find_activity_id->fetch(PDO::FETCH_ASSOC);

     $stmt2 = $con->prepare ("INSERT INTO `activites_table` (`activity_id`, `company_purpose`, `sub_sector`, `activity`, `activity_description`, `activityApproval`, `activity_exceptions`) 
     VALUES ('".$activity_id["activity_id"]."','".$company_purpose."','".$sub_sector."','".$activity."','".$activity_description."','".$activityApproval."','".$activity_exceptions."') ");
     $query3 = $stmt2->execute();

     if($query3){
        echo json_encode("Done");
    }else {
        echo json_encode("erorr");
    }
?>