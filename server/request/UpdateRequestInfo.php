<?php
include "../connect.php";

$data = json_decode(file_get_contents('php://input'), true);

$request_id = $_GET["request_id"];
$mainService = $data['mainService'];
$subService = $data['subService'];
$clientName = $data['requester'];
$clientEmail = $data['requesterEmail'];
$clientPhoneNo = $data['requesterPhoneNumber'];
$companyName = $data['companyName'];
$companyTaxNumber = $data['companyTaxNumber'];
$requestDetails = $data['requestDetails'];
$communicationChannel = $data['communicationChannel'];
$law = $data['law'];
$legalform = $data['legalform'];
$entity = $data['entity'];

$stmt = $con->prepare("UPDATE `request_information` SET `client_name` = :clientName, `client_email` = :clientEmail, `client_phone_no` = :clientPhoneNo, `mainService` = :mainService, `subService` = :subService, `company_name` = :companyName, `company_tax_number` = :companyTaxNumber, `request_details` = :requestDetails, `communicationChannel` = :communicationChannel, `active` = '1', `law` = :law, `legalform` = :legalform, `entity` = :entity WHERE `request_id` = :request_id");

$stmt->bindParam(':clientName', $clientName);
$stmt->bindParam(':clientEmail', $clientEmail);
$stmt->bindParam(':clientPhoneNo', $clientPhoneNo);
$stmt->bindParam(':mainService', $mainService);
$stmt->bindParam(':subService', $subService);
$stmt->bindParam(':companyName', $companyName);
$stmt->bindParam(':companyTaxNumber', $companyTaxNumber);
$stmt->bindParam(':requestDetails', $requestDetails);
$stmt->bindParam(':communicationChannel', $communicationChannel);
$stmt->bindParam(':law', $law);
$stmt->bindParam(':legalform', $legalform);
$stmt->bindParam(':entity', $entity);
$stmt->bindParam(':request_id', $request_id);

$query = $stmt->execute();
if ($query) {
    echo json_encode("success");
} else {
    echo json_encode("error");
}
