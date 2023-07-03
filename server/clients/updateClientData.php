<?php
include "../connect.php";
$data = json_decode(file_get_contents('php://input'), true);
$request_number = $_GET['request_number'];
$customerName = $data["customerName"];
$customerPhoneNo = $data["customerPhoneNo"];
$customerEmail = $data["customerEmail"];

$customerNo;

$stmt2 = $con->prepare("SELECT customer_id FROM request_information WHERE request_id = $request_number");
$query2 = $stmt2->execute();
$CustomerId = $stmt2->fetch(PDO::FETCH_ASSOC);
$customerNo = $CustomerId['CustomerId'];


$stmt = $con->prepare ("UPDATE `customer` SET `mainService` = '".$mainService."', `subService` = '".$subService."', `company_name` = '".$companyName."', `company_type` = '".$companyType."', `company_tax_number` = '".$companyTaxNumber."', `company_name` = '".$companyName."', `company_type` = '".$companyType."', `company_tax_number` = '".$companyTaxNumber."', `request_details` = '".$requestDetails."', `active` = '1' WHERE `request_id` = '".$request_id."'");
$query = $stmt->execute();


$stmt = $con->prepare ("INSERT INTO `customer` (`CustomerName`, `CustomerPhone`, `CustomerEmail`) 
VALUES ('".$customerName."','".$customerPhoneNo."','".$customerEmail."') ");
$query = $stmt->execute();


$stmt2 = $con->prepare("SELECT CustomerId FROM customer ORDER BY CustomerId DESC LIMIT 1");
$query2 = $stmt2->execute();
$CustomerId = $stmt2->fetch(PDO::FETCH_ASSOC);
$customerNo = $CustomerId['CustomerId'];

if($query2){
    echo json_encode($customerNo);
}else {
    echo json_encode("erorr");
}
?>