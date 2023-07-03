<?php
include "../connect.php";
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
$user_privilege = $_SESSION['user_roles'];
$user_department = $_SESSION['department'];
$data = json_decode(file_get_contents('php://input'), true);
//request_information
$mainService = $data['mainService'];
$subService = $data['subService'];
$companyName = $data['companyName'];
$companyTaxNumber = $data['companyTaxNumber'];
// $companyType = $data['companyType'];
$entity = $data['entity'];
$law = $data['law'];
$legalform = $data['legalform'];


$request_status = $data["request_status"]; // جديد
$request_date = (new DateTime())->format('Y-m-d');
$assigned_date = (new DateTime())->format('Y-m-d');
$request_type = $data["request_type"]; // تحت التعديل
// $requester = $data['Requester'];
$requestStatusDate = (new DateTime())->format('Y-m-d');
// $companyLaw = $data['companyLaw'];
$clientName = $data['clientName'];
$clientPhoneNum = $data['clientPhoneNum'];
$clientEmail = $data['clientEmail'];
$request_details = $data['request_details'];
$communicationChannel = $data['communicationChannel'];

$tables_name = ["request_information", "request_supporting_documents", "request_work_orders", "request_status_log"];

$tables_num = count($tables_name);

for ($x = 0; $x < $tables_num; $x++) {
    if ($x == 0) {
        $getDepartment = $con->prepare("SELECT `name` from department WHERE `main_service` = $mainService AND `sub_service` =  $subService");
        $runGetDepartment = $getDepartment->execute();
        $department_name = $getDepartment->fetch(PDO::FETCH_ASSOC);

        if (is_array($department_name) && isset($department_name['name'])) {
            $assigned_department = $department_name['name'];
        } else {
            // Handle the case when the department name is not found
            $assigned_department = '';
        }

        $stmt = $con->prepare("INSERT INTO `$tables_name[$x]` (`request_registrar`,`stage`,`assigned_to`, `assigned_department`, `assigned_date`,`mainService`,`subService`,`company_name`,`company_tax_number`,`entity`,`law`,`legalform`,`request_date`,`request_status_date`,`client_name`,`client_phone_no`,`client_email`,`request_status`,`request_type`,`request_details`,`communicationChannel`,`active`) 
            VALUES ($user_id, 'مرحلة 1',2, :assigned_department, :assigned_date, $mainService, $subService, '$companyName', '$companyTaxNumber',$entity,$law, $legalform, '$request_date', '$requestStatusDate', '$clientName', '$clientPhoneNum', '$clientEmail', '$request_type', '$request_status', '$request_details', '$communicationChannel', 1)");

        $stmt->bindParam(':assigned_department', $assigned_department);
        $stmt->bindParam(':assigned_date', $assigned_date);

        $query = $stmt->execute();

        $find_request_id = $con->prepare("SELECT request_id from request_information WHERE `request_registrar` = $user_id ORDER BY request_id DESC LIMIT 1");
        $query2 = $find_request_id->execute();
        $request_id = $find_request_id->fetch(PDO::FETCH_ASSOC);

        if ($query) {
            // echo json_encode("success");
        } else {
            // echo json_encode("error");
        }
    } else if ($x == 1) {
        header('Content-type: JSON');
        $supporting_document = array();
        $stmt = $con->prepare("SELECT * FROM supporting_documents WHERE `main_service` = $mainService AND `sub_service` = $subService AND `entity` = $entity AND `law` = $law AND `legalform` = $legalform");
        $query = $stmt->execute();
        $i = 0;
        while ($Data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $supporting_document[$i]['name'] = $Data['name'];
            $supporting_document[$i]['model_sheet_path'] = $Data['model_sheet_path'];
            $supporting_document[$i]['document_order'] = $Data['document_order'];
            $i++;
        }
        $i = 0;
        while ($i < count($supporting_document)) {
            $stmt1 = $con->prepare("INSERT INTO `$tables_name[$x]` (`request_id`,`supporting_document`,`status`,`model_sheet`,`document_order`,`added_by`,`added_date`) 
                VALUES ('" . $request_id["request_id"] . "', '" . $supporting_document[$i]['name'] . "', 'لم يبدأ', '" . $supporting_document[$i]['model_sheet_path'] . "', '" . $supporting_document[$i]['document_order'] . "', '" . $user_id . "', '" . (new DateTime())->format('Y-m-d') . "')");
            $query = $stmt1->execute();
            $i++;
        }
        // echo json_encode($supporting_document, JSON_PRETTY_PRINT);
    } else if ($x == 2) {
        header('Content-type: JSON');
        $approval = array();
        $approvalDescription = array();
        $stmt = $con->prepare("SELECT * FROM approvals WHERE `main_service` = $mainService AND `sub_service` = $subService AND `entity` = $entity AND `law` = $law AND `legalform` = $legalform AND (`status` = 1 OR `status` = 'مطلوب')");
        $query = $stmt->execute();
        $i = 0;
        while ($Data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $approval[$i] = $Data;
            $i++;
        }
        $i = 0;
        while ($i < count($approval)) {
            $stmt1 = $con->prepare("INSERT INTO `$tables_name[$x]` (`request_id`,`approval_order`,`approval_required`,`approval_description`,`status`,`estimated_cost`,`estimated_duration`,`model_sheet`,`added_by`,`added_date`, `assigned_to`, `status_date`) 
                VALUES ('" . $request_id["request_id"] . "', '" . $approval[$i]['approval_order'] . "', '" . $approval[$i]['approval_name'] . "', '" . $approval[$i]['approval_description'] . "', 'لم يبدأ', '" . $approval[$i]['estimated_cost'] . "', '" . $approval[$i]['estimated_duration'] . "', '" . $approval[$i]['model_sheet_path'] . "', '" . $user_id . "', '" . (new DateTime())->format('Y-m-d') . "', $user_id, '" . (new DateTime())->format('Y-m-d') . "')");
            $query = $stmt1->execute();
            $i++;
        }
        // echo json_encode($approval, JSON_PRETTY_PRINT);
    } else if ($x == 3) {
        $stmt1 = $con->prepare("INSERT INTO `$tables_name[$x]` (`request_id`,`status`,`status_date`,`responsible`,`department`) 
            VALUES ('" . $request_id["request_id"] . "', 1, '" . (new DateTime())->format('Y-m-d') . "', $user_id, $user_department)");
        $query = $stmt1->execute();
    } else {
        $stmt2 = $con->prepare("INSERT INTO `$tables_name[$x]` (`request_id`) 
            VALUES ('" . $request_id["request_id"] . "')");
        $query3 = $stmt2->execute();
        if ($query3) {
            // echo json_encode($tables_name[$i]);
            // echo json_encode("done");
        } else {
            // echo json_encode("erorr");
        }
    }
}
echo json_encode($request_id);
