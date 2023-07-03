<?php
include "../connect.php";
$key = $_GET['key'];

$stmt = $con->prepare("SELECT * FROM company_types WHERE `id` = '".$key."'");
$query = $stmt->execute();
$companyType = $stmt->fetch(PDO::FETCH_ASSOC);

if($query){
    echo json_encode($companyType);
}else {
    echo json_encode("error");
}
?>