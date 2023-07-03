<?php
    include "connect.php";
    $request_id = $_GET["request_id"];
    session_start();
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['name'];
    $user_privilege = $_SESSION['user_roles'];
    $user_department = $_SESSION['department'];

    $response = array();

    $stmt = $con->prepare("SELECT `user-id`, `user_name`, `national_id`, `user_email`, `user_name_ar`, `roles`, `department_id` FROM user WHERE `user-id` = '".$user_id."' ");
    $query = $stmt->execute();
    
    if($query){
        header('Content-type: JSON');
        $i=0;
        while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $response[$i]['user_id'] = $requestData['user-id'];
            $response[$i]['user_name'] = $requestData['user_name'];
            $response[$i]['national_id'] = $requestData['national_id'];
            $response[$i]['user_email'] = $requestData['user_email'];
            $response[$i]['user_name_ar'] = $requestData['user_name_ar'];
            $response[$i]['roles'] = $requestData['roles'];
            $response[$i]['department_id'] = $requestData['department_id'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }else {
        echo json_encode("error");
    }
?>