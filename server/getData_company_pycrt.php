<?php 
    include "connect.php";

    $request_id = $_GET["request_id"];

    $stmt = $con->prepare("SELECT `number_of_pycrt_id` FROM number_of_pycrt WHERE request_id = '".$request_id."' AND `active` != '"."d"."' ");
    $query = $stmt->execute();
    $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result;

    for ($i=0; $i < count($userData); $i++) { 
        $stmt2 = $con->prepare("SELECT * FROM data_of_pycrt WHERE `num_id` = '".$userData[$i]["number_of_pycrt_id"]."'");
        $query2 = $stmt2->execute();
        $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        if(isset($result[$i])){
            echo json_encode($result);
        }else{
            echo json_encode('No Data!');
            exit();
        }
    }
?>