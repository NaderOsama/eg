<?php
$config = parse_ini_file('../connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if($con->connect_error) {
  exit('Could not connect');
}
session_start();
$user_id = $_SESSION['user_id'];
$id = $_GET['id'];

$upload_dir = '../../attachments/approvals/';

if (!empty($_FILES['file']['name'])) {
  $file = $_FILES['file'];

  $file_name = $file['name'];
  $file_tmp = $file['tmp_name'];
  $file_path = $upload_dir . $file_name;


  $stmt = $con->prepare ("UPDATE `request_work_orders` SET `attachment` = '".$file_path."', `attachment_file_name` = '".$file_name."', `responsible` = $user_id, `uploaded_date` = '".(new DateTime())->format('Y-m-d')."', status = 'جاري العمل', `status_date` = '".(new DateTime())->format('Y-m-d')."'  WHERE id = $id");
    $query = $stmt->execute();
  if (move_uploaded_file($file_tmp, $file_path)) {
    http_response_code(200);
    echo json_encode(['filePath' => $file_path]);
  } else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to store file']);
  }
} else {
  http_response_code(400);
  echo json_encode(['error' => 'No file provided']);
}