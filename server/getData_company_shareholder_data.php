<?php 
    include "connect.php";

    $request_id = $_GET["request_id"];

    $stmt = $con->prepare("SELECT `num_of_shareholder_id` FROM number_of_shareholder WHERE request_id = '".$request_id."' AND `active` != '"."d"."' ");
    $query = $stmt->execute();
    $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $row = [];
    $result = [];
    for ($i=0; $i < count($userData); $i++) { 
        $stmt2 = $con->prepare("SELECT * FROM shareholder_data WHERE `num_of_s_id` = '".$userData[$i]["num_of_shareholder_id"]."'");
        $query2 = $stmt2->execute();
        if(isset($query2['num_of_s_id'])){
            array_push($row,$stmt2->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('No Data!');
            exit();
        }
    }
    for ($i=0; $i < count($row); $i++) { 
        $result[$i] = $row[$i][0];
    }
    echo json_encode($result);
?>