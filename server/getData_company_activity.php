<?php 
    include "connect.php";

    $request_id = $_GET["request_id"];

    $stmt = $con->prepare("SELECT `activity_id` FROM activity WHERE request_id = '".$request_id."' AND `active` != '"."d"."' ");
    $query = $stmt->execute();
    $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result;
    for ($i=0; $i < count($userData); $i++) { 
        $stmt2 = $con->prepare("SELECT * FROM activites_table WHERE `activity_id` = '".$userData[$i]["activity_id"]."'");
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