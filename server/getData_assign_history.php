<?php
    include "connect.php";
    $request_id = $_GET["request_id"];
    $response = array();

    $stmt = $con->prepare("SELECT * FROM assign_request WHERE `request_id` = '".$request_id."'");
    $query = $stmt->execute();
    
    if($query){
        header('Content-type: JSON');
        $i=0;
        while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $response[$i]['assignment_id'] = $requestData['assignment_id'];
            $response[$i]['request_id'] = $requestData['request_id'];
            $response[$i]['assign_to_id'] = $requestData['assign_to_id'];
            $response[$i]['assign_to_username'] = $requestData['assign_to_username'];
            $response[$i]['assign_to_user_email'] = $requestData['assign_to_user_email'];
            $response[$i]['assign_to_department'] = $requestData['assign_to_department'];
            $response[$i]['assign_by_id'] = $requestData['assign_by_id'];
            $response[$i]['assign_by_username'] = $requestData['assign_by_username'];
            $response[$i]['assign_by_user_email'] = $requestData['assign_by_user_email'];
            $response[$i]['assign_by_user_department'] = $requestData['assign_by_user_department'];
            $response[$i]['assign_date'] = $requestData['assign_date'];
            $response[$i]['comment'] = $requestData['comment'];
            $response[$i]['history'] = $requestData['history'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }else {
        echo json_encode("error");
    }
?>