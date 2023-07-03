<?php
    include "connect.php";

    //data_of_pycrt
    $num_id  = $_GET["num_id"];
    $data_of_pycrt_name  = $_GET["data_of_pycrt_name"];
    $data_of_pycrt_email = $_GET["data_of_pycrt_email"];
    $data_of_pycrt_phone = $_GET["data_of_pycrt_phone"];
    $data_of_pycrt_fax = $_GET["data_of_pycrt_fax"];
    
    $stmt11 = $con->prepare ("UPDATE `data_of_pycrt` SET `data_of_pycrt_name` = '".$data_of_pycrt_name."', `data_of_pycrt_email` = '".$data_of_pycrt_email."', `data_of_pycrt_phone` = '".$data_of_pycrt_phone."', `data_of_pycrt_fax` = '".$data_of_pycrt_fax."' WHERE `num_id` = '".$num_id."'");
    $query11 = $stmt11->execute();
    if($query11){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }
?>