<?php
    include "connect.php";
    $request_id = $_GET["request_id"];
    header('Content-type: JSON');
    $data = json_decode(file_get_contents('php://input'), true);
    $user_id = $data["assign6"];

    $stmt = $con->prepare("SELECT `department_id` FROM user WHERE `user-id` = '".$user_id."' ");
    $query = $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $con->prepare("SELECT `name` FROM department WHERE `id` = '".$userData['department_id']."' ");
    $query = $stmt->execute();
    $userData2 = $stmt->fetch(PDO::FETCH_ASSOC);

    if($query){
        echo json_encode($userData2);
    }else {
        echo json_encode("error");
    }
?>