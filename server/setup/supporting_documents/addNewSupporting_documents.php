<?php
include "../../connect.php";
$data = json_decode(file_get_contents('php://input'), true);

$name = $data['name'];
$model_sheet_path = $data['model_sheet_path'];
$company_type = $data['company_type'];
$document_description = $data['document_description'];
$main_service = $data['main_service'];
$sub_service = $data['sub_service'];
$document_status = $data['document_status'];


$stmt = $con->prepare("INSERT INTO `supporting_documents` (`name`,`model_sheet_path`,`company_type`,`document_description`,`main_service`,`sub_service`,`document_status`) VALUES ('" . $name . "', '" . $model_sheet_path . "', '" . $company_type . "', '" . $document_description . "', '" . $main_service . "', '" . $sub_service . "', '" . $document_status . "')");
$query = $stmt->execute();

if ($query) {
    echo json_encode("success");
} else {
    echo json_encode("error");
}
?>