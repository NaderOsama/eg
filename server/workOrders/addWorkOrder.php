<?php
include "../connect.php";
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
$user_privilege = $_SESSION['user_roles'];
$user_department = $_SESSION['department'];

$data = json_decode(file_get_contents('php://input'), true);
$request_id = $data["request_id"];
$request_approval_id = $data['request_approval_id'];
$assign_to = $data['assign_to'];
$assign_to_department = $data['assigned_to_department'];

$stmt2 = $con->prepare ("UPDATE `request_work_orders` SET `assigned_to` = $assign_to WHERE `id` = '".$request_approval_id."'");
$query2 = $stmt2->execute();

$stmt1 = $con->prepare("INSERT INTO `work_orders` (`request_id`,`request_approval_id`,`assigned_by`,`assigned_to`,`assignment_date`,`status`,`finished_date`, `assigned_by_department`, `assigned_to_department`) 
    VALUES ('" . $request_id . "', $request_approval_id, $user_id, $assign_to, '" . (new DateTime())->format('Y-m-d') . "', 'جاري العمل', '0000-00-00', $user_department, $assign_to_department)");
$query = $stmt1->execute();

if ($query) {
    // echo json_encode($tables_name[$i]);
    echo json_encode("done");
} else {
    echo json_encode("erorr");
}
?>