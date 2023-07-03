<?php
$config = parse_ini_file('../connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($con->connect_error) {
  exit('Could not connect');
}

session_start();
$request_id = $_SESSION['request_id'];
$request_date = $_SESSION['request_date'];

$upload_dir = '../../AG_SysDoc/AG_SysWorkData/';

$folder_name = 'Req_' . date('Ymd', strtotime($request_date)) . '_' . sprintf("%08d", $request_id) . '/Docs';

$folder_path = $upload_dir . $folder_name;

if (!is_dir($folder_path)) {
  mkdir($folder_path, 0777, true);
}

if (!empty($_FILES['file']['name'])) {
  $file = $_FILES['file'];

  $file_name = $file['name'];
  $file_tmp = $file['tmp_name'];
  $file_path = $folder_path . '/' . $file_name;
  $counter = 1;
  $original_file_name = $file_name;

  while (file_exists($file_path)) {
    $file_name = '(' . $counter . ')' . $original_file_name;
    $file_path = $folder_path . '/' . $file_name;
    $counter++;
  }

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
