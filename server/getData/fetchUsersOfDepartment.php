<?php
include "../connect.php";
$data = json_decode(file_get_contents('php://input'), true);
// $except = $data['user'];
$department = $data['dep'];
$response = array();
$i=0;

$getUsers = $con->prepare("SELECT `user-id`,`user_name_ar` from user WHERE `department_id` = $department AND `user-id` NOT IN (2,30)");
$runGetUsers = $getUsers->execute();

while ($users = $getUsers->fetch(PDO::FETCH_ASSOC)) {
    $response[$i] = $users;
    $i++;
}


if($runGetUsers){
    echo json_encode($response);
}else {
    echo json_encode("error");
}
?>