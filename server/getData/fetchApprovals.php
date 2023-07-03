<?php
include "../connect.php";

$data = array();

$stmt = $con->prepare("SELECT * FROM approvals");
$query = $stmt->execute();

if($query){
    header('Content-type: JSON');
    $i=0;
    while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[$i]['id'] = $requestData['id'];
        $data[$i]['name'] = $requestData['name'];
        $i++;
    }
    echo json_encode($data, JSON_PRETTY_PRINT);
}else {
    echo json_encode("error");
}
?>