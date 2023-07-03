<?php
$config = parse_ini_file('../connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if($con->connect_error) {
  exit('Could not connect');
}
$STR = $_GET['STR'];
$approvalObj = [];

// Move uploaded file to the approvals folder
$targetPath = '../../attachments/shareholders/'. basename($_FILES[$STR]['name']);
move_uploaded_file($_FILES[$STR]['tmp_name'], $targetPath);
$approvalObj[0] = $targetPath;

echo json_encode(basename($_FILES[$STR]['name']));
?>