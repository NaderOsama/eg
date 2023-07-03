<?php
include "../connect.php";
$data = json_decode(file_get_contents('php://input'), true);
$mainService = $data['main_service'];
$subService = $data['sub_service'];

$getDepartment = $con->prepare("SELECT `id`,`name` from department WHERE `main_service` = $mainService AND `sub_service` =  $subService");
$runGetDepartment = $getDepartment->execute();
$department_name = $getDepartment->fetch(PDO::FETCH_ASSOC);

if($runGetDepartment){
    echo json_encode($department_name);
}else {
    echo json_encode("error");
}
?>