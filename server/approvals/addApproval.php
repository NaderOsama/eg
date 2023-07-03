<?php
    include "../connect.php";
    session_start();
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['name'];
    $user_privilege = $_SESSION['user_roles'];
    // $companyType = $_GET['companyType'];
    $response = array();

    $request_id = $_GET["request_id"];
    $data = json_decode(file_get_contents('php://input'), true);

    $approvalName = $data['newApprovalName'];
    $newApprovalDescription = $data['newApprovalDescription'];
    $approvalModelPath = $data['newApprovalModelPath'];
    $approvalEstimatedCost = $data['newApprovalEstimatedCostValue'];
    $approvalEstimatedDuration = $data['newApprovalEstimatedDurationValue'];
    $approvalResponsible = $data['newApprovalResponsibleName'];
    $approvalActualDurationValue = $data['newApprovalActualDurationValue'];
    $approvalAttachment = $data['newApprovalAttachment'];
    $approvalUploadedDate = $data['newApprovalUploadedDateValue'];
    // $approvalActualCost = $data['newApprovalActualCostValue'];
    $approvalBill = $data['newApprovalBillPath'];
    $approvalComment = $data['newApprovalComment'];
    $approvalStatusValue = $data['newApprovalStatusValue'];
    $newApprovalStatusDate = $data['newApprovalStatusDate'];
    if ($approvalUploadedDate == 'true') {
        $approvalUploadedDate = (new DateTime())->format('Y-m-d');
    }
    

    $stmt1 = $con->prepare ("INSERT INTO `request_work_orders` (`request_id`,`approval_required`, `approval_description`,`status`, `status_date`,`estimated_cost`,`model_sheet`, `estimated_duration`, `responsible`, `attachment`, `bill`, `comment`, `uploaded_date`, `actual_duration`, `added_by`,`added_date`) 
    VALUES ('".$request_id."', '".$approvalName."', '".$newApprovalDescription."', '".$approvalStatusValue."', '".$newApprovalStatusDate."', '".$approvalEstimatedCost."', '".$approvalModelPath."', '".$approvalEstimatedDuration."', '".$approvalResponsible."', '".$approvalAttachment."', '".$approvalBill."', '".$approvalComment."', '".$approvalUploadedDate."', '".$approvalActualDurationValue."','".$user_id."', '".(new DateTime())->format('Y-m-d')."')");
    $query = $stmt1->execute();
    
    $response[0] = 'done';
    
    $stmt = $con->prepare("SELECT id FROM request_work_orders WHERE `request_id` = $request_id ORDER BY id DESC LIMIT 1");
    $query = $stmt->execute();
    $requestData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $response[1] = $requestData;

    if($query){
        // echo json_encode($tables_name[$i]);
        echo json_encode($response);
    }else {
        echo json_encode("erorr");
    }
?>