<?php
include "../connect.php";
$id = $_GET['key1'];

$getDepartment = $con->prepare("SELECT `id`,`name` from department WHERE `id` = $id");
$runGetDepartment = $getDepartment->execute();
$department_name = $getDepartment->fetch(PDO::FETCH_ASSOC);

if($runGetDepartment){
    echo json_encode($department_name);
}else {
    echo json_encode("error");
}
?>