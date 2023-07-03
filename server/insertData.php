<?php
    include "connect.php";
    session_start();
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['name'];
    $user_privilege = $_SESSION['user_roles'];
    $companyType = $_GET['companyType'];
    $data = json_decode(file_get_contents('php://input'), true);
    $mainService = $data['mainService'];
    $subService = $data['subService'];

    $tables_name = ["request_information","number_of_shareholder","pre_establishment_data","legal_structures","legal_counsel","number_of_founding_agent","number_of_pycrt","company_name","company_address","capital_data","number_of_board_of_directors","activity","request_supporting_documents","request_approvals","company_auditor"];

    $tables_num = count($tables_name);

    for ($x=0; $x < $tables_num; $x++) {
        if ($x == 0) {
            $stmt = $con->prepare ("INSERT INTO `$tables_name[$x]` (`request_registrar`,`stage`,`assigned_to`, `mainService`, `subService`) 
            VALUES ($user_id, 'مرحلة 1', $user_id, $mainService, $subService)");
            $find_request_id = $con->prepare("SELECT request_id from request_information WHERE `request_registrar` = $user_id ORDER BY request_id DESC LIMIT 1");
            $query = $stmt->execute();
            $query2 = $find_request_id->execute();
            $request_id = $find_request_id->fetch(PDO::FETCH_ASSOC);
            if($query){
                // echo json_encode("success");
            }else {
                // echo json_encode("erorr");
            }
        }else if($x == 12){
            header('Content-type: JSON');
            $supporting_document = array();
            $stmt = $con->prepare("SELECT * FROM supporting_documents WHERE company_type = $companyType");
            $query = $stmt->execute();
            $i=0;
            while ($Data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $supporting_document[$i]['name'] = $Data['name'];
                $supporting_document[$i]['estimated_cost'] = $Data['estimated_cost'];
                $supporting_document[$i]['model_sheet_path'] = $Data['model_sheet_path'];
                $i++;
            }
            $i=0;
            while($i < count($supporting_document)){
                $stmt1 = $con->prepare ("INSERT INTO `$tables_name[$x]` (`request_id`,`supporting_document`,`status`,`estimated_cost`,`model_sheet`) 
                VALUES ('".$request_id["request_id"]."', '".$supporting_document[$i]['name']."', 'لم يبدأ', '".$supporting_document[$i]['estimated_cost']."', '".$supporting_document[$i]['model_sheet_path']."')");
                $query = $stmt1->execute();
                $i++;
            }
            // echo json_encode($supporting_document, JSON_PRETTY_PRINT);
        }else if($x == 13){
            header('Content-type: JSON');
            $approval = array();
            $approvalDescription = array();
            $stmt = $con->prepare("SELECT * FROM approvals");
            $query = $stmt->execute();
            $i=0;
            while ($Data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $approval[$i]['id'] = $Data['id'];
                $approval[$i]['name'] = $Data['name'];
                $i++;
            }
            $i=0;
            $z=0;
            while($i < count($approval)){
                $stmt = $con->prepare("SELECT * FROM approvals_description WHERE company_type = $companyType AND `status` = 1 AND approval_id = '".$approval[$i]['id']."'");
                $query = $stmt->execute();
                while ($Data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $approvalDescription[$z]['approval_name'] = $Data['approval_name'];
                    $approvalDescription[$z]['approval_description'] = $Data['approval_description'];
                    $approvalDescription[$z]['approval_order'] = $Data['approval_order'];
                    $approvalDescription[$z]['model_sheet_path'] = $Data['model_sheet_path'];
                    $approvalDescription[$z]['estimated_cost'] = $Data['estimated_cost'];
                    $approvalDescription[$z]['estimated_duration'] = $Data['estimated_duration'];
                    $approvalDescription[$z]['status'] = $Data['status'];
                    $z++;
                }
                $i++;
            }
            $i=0;
            while($i < count($approvalDescription)){
                $stmt1 = $con->prepare ("INSERT INTO `$tables_name[$x]` (`request_id`,`approval_order`,`approval_required`,`approval_description`,`status`,`estimated_cost`,`estimated_duration`,`model_sheet`,`added_by`,`added_date`) 
                VALUES ('".$request_id["request_id"]."', '".$approvalDescription[$i]['approval_order']."', '".$approvalDescription[$i]['approval_name']."', '".$approvalDescription[$i]['approval_description']."', 'لم يبدأ', '".$approvalDescription[$i]['estimated_cost']."', '".$approvalDescription[$i]['estimated_duration']."', '".$approvalDescription[$i]['model_sheet_path']."', '".$user_id."', '".(new DateTime())->format('Y-m-d')."')");
                $query = $stmt1->execute();
                $i++;
            }
            // echo json_encode($approval, JSON_PRETTY_PRINT);
        }else{
            $stmt2 = $con->prepare ("INSERT INTO `$tables_name[$x]` (`request_id`) 
            VALUES ('".$request_id["request_id"]."')");
             $query3 = $stmt2->execute();
             if($query3){
                // echo json_encode($tables_name[$i]);
                // echo json_encode("done");
            }else {
                // echo json_encode("erorr");
            }
        }
    }
    echo json_encode($request_id);
?>