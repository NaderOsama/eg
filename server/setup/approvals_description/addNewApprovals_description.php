<?php
include "../../connect.php";
$data = json_decode(file_get_contents('php://input'), true);


$main_service = $data['main_service'];
$sub_service = $data['sub_service'];
$company_type = $data['company_type'];
$approval_order = $data['approval_order'];
$approval_name = $data['approval_name'];
$approval_description = $data['approval_description'];
$model_sheet_path = isset($data['model_sheet_path']) ? $data['model_sheet_path'] : '';
$estimated_cost = $data['estimated_cost'];
$estimated_duration = $data['estimated_duration'];
$status = $data['status'];


$stmt = $con->prepare("INSERT INTO `approvals` ( `main_service`, `sub_service`, `company_type`, `approval_order`, `approval_name`, `approval_description`, `model_sheet_path`, `estimated_cost`, `estimated_duration`, `status`) VALUES ('" . $main_service . "', '" . $sub_service . "', '" . $company_type . "', '" . $approval_order . "', '" . $approval_name . "', '" . $approval_description . "', '" . $model_sheet_path . "', '" . $estimated_cost . "', '" . $estimated_duration . "', '" . $status . "')");
$query = $stmt->execute();



if ($query) {
    echo json_encode("success");
} else {
    echo json_encode("error");
}

?>