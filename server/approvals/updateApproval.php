<?php
    include "../connect.php";

    $data = json_decode(file_get_contents('php://input'), true);
    $request_approval_id = $data['request_approval_id'];
    $approval_required = $data['approval_required'];
    $approval_description = $data['approval_description'];
    $model_sheet = $data['model_sheet'];
    $estimated_cost = $data['estimated_cost'];
    $estimated_duration = $data['estimated_duration'];
    $comment = $data['comment'];
    $status = $data['status'];
    $status_date = $data['status_date'];
    $assigned_to = $data['assigned_to'];

    if(strlen($model_sheet) == 0){
        $stmt = $con->prepare ("UPDATE `request_work_orders` SET `approval_required` = '".$approval_required."', `approval_description` = '".$approval_description."', `estimated_cost` = '".$estimated_cost."', `estimated_duration` = '".$estimated_duration."', `comment` = '".$comment."', `status` = '".$status."', `status_date` = '".$status_date."', `assigned_to` = '".$assigned_to."' WHERE `id` = '".$request_approval_id."'");
        $query = $stmt->execute();
    }else{
        $stmt = $con->prepare ("UPDATE `request_work_orders` SET `approval_required` = '".$approval_required."', `approval_description` = '".$approval_description."', `model_sheet` = '".$model_sheet."', `estimated_cost` = '".$estimated_cost."', `estimated_duration` = '".$estimated_duration."', `comment` = '".$comment."', `status` = '".$status."', `status_date` = '".$status_date."', `assigned_to` = '".$assigned_to."' WHERE `id` = '".$request_approval_id."'");
        $query = $stmt->execute();
    }
    if($query){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }
?>