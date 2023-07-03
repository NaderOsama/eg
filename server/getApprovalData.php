<?php 
    include "connect.php";

    $request_id = $_GET["request_id"];
    header('Content-type: JSON');
    $approval = array();

    $stmt = $con->prepare("SELECT * FROM request_work_orders WHERE request_id = '".$request_id."' ORDER BY `approval_order`");
    $query = $stmt->execute();
    $i=0;
    while ($Data = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $approval[$i]['id'] = $Data['id'];
        $approval[$i]['approval_order'] = $Data['approval_order'];
        $approval[$i]['approval_required'] = $Data['approval_required'];
        $approval[$i]['approval_description'] = $Data['approval_description'];
        $approval[$i]['model_sheet'] = $Data['model_sheet'];
        $approval[$i]['estimated_cost'] = $Data['estimated_cost'];
        $approval[$i]['actual_cost'] = $Data['actual_cost'];
        $approval[$i]['estimated_duration'] = $Data['estimated_duration'];
        $approval[$i]['actual_duration'] = $Data['actual_duration'];
        $approval[$i]['added_by'] = $Data['added_by'];
        $approval[$i]['added_date'] = $Data['added_date'];
        $approval[$i]['responsible'] = $Data['responsible'];
        $approval[$i]['attachment'] = $Data['attachment'];
        $approval[$i]['attachment_file_name'] = $Data['attachment_file_name'];
        $approval[$i]['uploaded_date'] = $Data['uploaded_date'];
        $approval[$i]['status'] = $Data['status'];
        $approval[$i]['status_date'] = $Data['status_date'];
        $approval[$i]['bill'] = $Data['bill'];
        $approval[$i]['bill_attachment_name'] = $Data['bill_attachment_name'];
        $approval[$i]['comment'] = $Data['comment'];
        $i++;
    }

    if($query){
        echo json_encode($approval);
    }else {
        echo json_encode("error");
    }
?>