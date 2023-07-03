<?php 
    include "connect.php";

    $request_id = $_GET["request_id"];
    header('Content-type: JSON');

    $stmt = $con->prepare("SELECT * FROM request_supporting_documents WHERE request_id = '".$request_id."'");
    $query = $stmt->execute();
    $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result;
    header('Content-type: JSON');
    $result = $userData;
    echo json_encode($result,JSON_PRETTY_PRINT);

    // $tables = [];
    // $tableFiltered = [];
    // $result = [];
    // $stmt = $con->prepare("SELECT * FROM approval_header");
    // $query = $stmt->execute();
    // // $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // array_push($tables,$stmt->fetchAll(PDO::FETCH_ASSOC));
    // for ($i=0; $i < count($tables[0]); $i++) {
    //     $tableFiltered[$i] = $tables[0][$i];
    // }

    // for ($i=0; $i < count($tableFiltered); $i++) { 
    //     $getApprovalHeader = $con->prepare("SELECT `name` FROM approval_header WHERE id = '".$tableFiltered[$i]['id']."'");
    //     $query = $getApprovalHeader->execute();
    //     $getApprovalHeader = $getApprovalHeader->fetch(PDO::FETCH_ASSOC);
    //     $stmt2 = $con->prepare("SELECT * FROM request_approvals WHERE request_id = '".$request_id."' AND `approval_header` = '".$getApprovalHeader['name']."'");
    //     $query2 = $stmt2->execute();
    //     array_push($result,$stmt2->fetchAll(PDO::FETCH_ASSOC));
    // }
    // echo json_encode($result, JSON_PRETTY_PRINT);
?>