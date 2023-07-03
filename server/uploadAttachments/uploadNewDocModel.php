<?php
$config = parse_ini_file('../connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if($con->connect_error) {
  exit('Could not connect');
}

$upload_dir = '../../attachments/modelSheet/supporting_documents/';

if (!empty($_FILES['file']['name'])) {
  $file = $_FILES['file'];

  $file_name = $file['name'];
  $file_tmp = $file['tmp_name'];
  $file_path = $upload_dir . $file_name;

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