<?php 
    include "connect.php";

    $request_id = $_GET["request_id"];

    $stmt = $con->prepare("SELECT * FROM data_of_pycrt WHERE request_id = '".$request_id."' ");
    $query = $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    if($query){
        echo json_encode($userData);
    }else {
        echo json_encode("error");
    }
?>