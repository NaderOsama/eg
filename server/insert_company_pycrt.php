<?php
    include "connect.php";

    $request_id = $_GET["request_id"];
    $data = json_decode(file_get_contents('php://input'), true);

    //data_of_pycrt
    $data_of_pycrt_name  = $data["data_of_pycrt_name"];
    $data_of_pycrt_email = $data["data_of_pycrt_email"];
    $data_of_pycrt_phone = $data["data_of_pycrt_phone"];
    $data_of_pycrt_fax = $data["data_of_pycrt_fax"];

    $getPycrtId = $con->prepare ("SELECT `number_of_pycrt_id` FROM number_of_pycrt WHERE `request_id` = '".$request_id."'");
    $query = $getPycrtId->execute();
    $getPycrtId = $getPycrtId->fetch(PDO::FETCH_ASSOC);

    $stmt = $con->prepare ("INSERT INTO `data_of_pycrt` (`num_id`, `data_of_pycrt_name`,`data_of_pycrt_email`,`data_of_pycrt_phone`,`data_of_pycrt_fax`) 
    VALUES ('".$getPycrtId['number_of_pycrt_id']."', '".$data_of_pycrt_name."','".$data_of_pycrt_email."','".$data_of_pycrt_phone."','".$data_of_pycrt_fax."')");
    $query = $stmt->execute();

    if($query){
        echo json_encode("PYCRT added successfuly");
    }else {
        echo json_encode("erorr");
    }
?>