<?php
$config = parse_ini_file('../connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if($con->connect_error) {
  exit('Could not connect');
}

$id = $_GET['id'];
$data = json_decode(file_get_contents('php://input'), true);
$status = $data['status'];
$actualDuration = $data['actualDuration'];
if ($actualDuration == 0) {
    $actualDuration = 1;
}

if ($status == 'تم') {
    $stmt = $con->prepare ("UPDATE `request_work_orders` SET `status` = '".$status."', `status_date` = '".(new DateTime())->format('Y-m-d')."', `actual_duration` = '".$actualDuration."'  WHERE id = $id");
    $query = $stmt->execute();
    if ($query) {
        echo json_encode('success1');
    }else{
        echo json_encode('error');
    }
}else{
    $stmt = $con->prepare ("UPDATE `request_approvals` SET `status` = '".$status."', `status_date` = '".(new DateTime())->format('Y-m-d')."', `actual_duration` = ''  WHERE id = $id");
    $query = $stmt->execute();
    if ($query) {
        echo json_encode('success2');
    }else{
        echo json_encode('error');
    }
}

?>