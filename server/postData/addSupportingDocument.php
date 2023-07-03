<?php
    include "../connect.php";
    session_start();
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['name'];
    $user_privilege = $_SESSION['user_roles'];
    // $companyType = $_GET['companyType'];

    $request_id = $_GET["request_id"];
    $data = json_decode(file_get_contents('php://input'), true);
    $supportingDocumentName = $data['supportingDocumentName'];
    $supportingDocumentDescription = $data['supportingDocumentDescription'];
    $supportingDocumentModelPath = $data['supportingDocumentModelPath'];
    $newDocResponsibleName = $data['newDocResponsibleName'];
    $newDocAttachment = $data['newDocAttachment'];
    $newDocAttachmentFileName = $data['newDocAttachmentFileName'];
    $newDocUploadedDate = $data['newDocUploadedDate'];
    $newDocStatus = $data['newDocStatus'];
    $newDocComment = $data['newDocComment'];

    $stmt1 = $con->prepare ("INSERT INTO `request_supporting_documents` (`request_id`,`supporting_document`,`description`,`status`,`model_sheet`,`responsible`,`attachment`,`comment`,`added_by`,`added_date`,`uploaded_date`, `attachment_file_name`) 
    VALUES ('".$request_id."', '".$supportingDocumentName."', '".$supportingDocumentDescription."', '".$newDocStatus."', '".$supportingDocumentModelPath."', $newDocResponsibleName, '".$newDocAttachment."','".$newDocComment."',$user_id, '".(new DateTime())->format('Y-m-d')."', '".(new DateTime())->format('Y-m-d')."', '".$newDocAttachmentFileName."')");
    $query = $stmt1->execute();

    if($query){
        // echo json_encode($tables_name[$i]);
        echo json_encode("done");
    }else {
        echo json_encode("erorr");
    }
?>