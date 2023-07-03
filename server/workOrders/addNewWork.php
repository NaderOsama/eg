<?php
include "../connect.php";
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
$user_privilege = $_SESSION['user_roles'];
$user_department = $_SESSION['department'];

$data = json_decode(file_get_contents('php://input'), true);
$requestOrderId = $data['requestOrderId'];
$requestApprovalAddedDate = $data['requestApprovalAddedDate'];
$workOrderId = $data['workOrderId'];
$workDate = $data["workDate"];
$workDone = $data['workDone'];
$workCostType = $data['workCostType'];
$workCost = $data['workCost'];
$workBill = $data['workBill'];
$workStatus = $data['workStatus'];
$workAttachment = $data['workAttachment'];
// $workAttachmentUploadedDate = $data['workAttachmentUploadedDate'];

$currentDate = (new DateTime())->format('Y-m-d');

// if(strlen($workAttachment) > 0){
//     $date1 = $requestApprovalAddedDate;
//     $date2 = ".$currentDate.";
    
//     // Convert strings to Unix timestamps
//     $timestamp1 = strtotime($date1);
//     $timestamp2 = strtotime($date2);
    
//     // Create DateTime objects from the Unix timestamps
//     $dateTime1 = new DateTime();
//     $dateTime1->setTimestamp($timestamp1);
    
//     $dateTime2 = new DateTime();
//     $dateTime2->setTimestamp($timestamp2);
    
//     // Calculate the difference in days between the two dates
//     $interval = $dateTime1->diff($dateTime2);
//     $diffInDays = $interval->days;
    
//     $stmt1 = $con->prepare("UPDATE `work_orders` SET `attachment` = '".$workAttachment."', `attachment_uploaded_date` = '".(new DateTime())->format('Y-m-d')."', `status` = 'تم' WHERE id = $workOrderId");
//     $query = $stmt1->execute();
//     $stmt2 = $con->prepare("UPDATE `request_work_orders` SET `attachment` = '".$workAttachment."', uploaded_date = '".(new DateTime())->format('Y-m-d')."', status = 'تم', actual_duration = $diffInDays WHERE id = $requestOrderId");
//     $query2 = $stmt2->execute();
// }
$totalFees1 = $con->prepare("SELECT SUM(CAST(cost AS DECIMAL(10,2))) FROM work_orders_log WHERE work_order_id = $workOrderId;");
$totalFees = $totalFees1->execute();

    $stmt = $con->prepare("UPDATE `work_orders` SET `status` = '".$workStatus."', fees = '".$totalFees."' WHERE id = $workOrderId");
    $query = $stmt->execute();
    $stmt1 = $con->prepare("INSERT INTO `work_orders_log` (`date`,`responsible`,`task`,`cost_type`,`cost`,`bill`,`status`,`work_order_id`,`attachment`) 
        VALUES ('".$workDate."', $user_id, '".$workDone."', '".$workCostType."', '".$workCost."', '".$workBill."', '".$workStatus."', $workOrderId, '".$workAttachment."')");
    $query1 = $stmt1->execute();
    $stmt3 = $con->prepare("UPDATE `request_work_orders` SET `status` = '".$workStatus."' WHERE id = $requestOrderId");
    $query3 = $stmt3->execute();

if ($query && $query1 && $query3) {
    // echo json_encode($tables_name[$i]);
    echo json_encode("success");
} else {
    echo json_encode("erorr");
}
?>