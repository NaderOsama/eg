<?php
    include "../connect.php";
    session_start();
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['name'];
    $user_privilege = $_SESSION['user_roles'];
    // $companyType = $_GET['companyType'];

    $request_id = $_GET["request_id"];
    $data = json_decode(file_get_contents('php://input'), true);
    $approvalName = $data['approvalName'];
    // $approvalDescription = $data['approvalDescription'];
    $approvalEstimatedCost = $data['approvalEstimatedCost'];
    $approvalModelPath = $data['approvalModelPath'];

    $stmt1 = $con->prepare ("INSERT INTO `request_approvals` (`request_id`,`approval_required`,`status`,`estimated_cost`,`model_sheet`,`added_by`,`added_date`,`assigned_to`) 
    VALUES ('".$request_id."', '".$approvalName."', 'لم يبدأ', '".$approvalEstimatedCost."', '".$approvalModelPath."', '".$user_id."', '".(new DateTime())->format('Y-m-d')."', $user_id)");
    $query = $stmt1->execute();

    if($query){
        // echo json_encode($tables_name[$i]);
        echo json_encode("done");
    }else {
        echo json_encode("erorr");
    }
?>